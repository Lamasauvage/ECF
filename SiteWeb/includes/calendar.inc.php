<?php

include_once '../includes/dbh.inc.php';

$frDates = ['Monday' => 'Lundi', 'Tuesday' => 'Mardi', 'Wednesday' => 'Mercredi', 'Thursday' => 'Jeudi', 'Friday' => 'Vendredi', 'Saturday' => 'Samedi', 'Sunday' => 'Dimanche'];

$date = $_GET['date'];
$date = str_replace('/', '-', $date);
$timestamp = strtotime($date);
$date = $frDates[date('l', $timestamp)];
$formattedDate = date('Y-m-d', $timestamp);

// Retrieve the booked slots for the selected date
$query = "SELECT time, valid_until FROM booking WHERE date = '" . $formattedDate . "';";
$result = mysqli_query($conn, $query);
$booked_slots = array();
while ($row = mysqli_fetch_assoc($result)) {
    if (strtotime($row['valid_until']) < time()) {
        // The booking has expired, so the table is now available
        $query = "UPDATE tables SET available = available + 1 WHERE table_id = (SELECT table_id FROM booking WHERE time = '" . $row['time'] . "')";
        mysqli_query($conn, $query);
    } else {
        // The booking is still active, so the time slot is not available
        $booked_slots[] = $row['time'];
    }
}

// Retrieve the opening and closing hours for the selected date
$query = "SELECT open_morning, close_morning, open_evening, close_evening, status FROM restauranthours WHERE day = '" . $date . "';";
$result = mysqli_query($conn, $query);
if($result){
  $row = mysqli_fetch_assoc($result);
  $open_time_morning = strtotime($row['open_morning']);
  $close_time_morning = strtotime($row['close_morning']);
  $open_time_evening = strtotime($row['open_evening']);
  $close_time_evening = strtotime($row['close_evening']);
  $status = $row['status'];
  $date = strtolower($date);
  if($status == "0"){
    echo json_encode(["Le restaurant est fermé le " . $date . ""]);
    exit();
  }
}else{
  echo "An error occured while fetching the opening and closing hours";
  exit();
}

// Initialize an array to store the available slots
$available_slots = array();

// Iterate through the hours of the day

// Morning
for ($time = $open_time_morning; $time <= $close_time_morning; $time = strtotime("+15 minutes", $time)) {
  if (strtotime("+1 hour", $time) > $close_time_morning) {
  continue;
  }
  if (!in_array(date("H:i", $time), $booked_slots)) {
    $query = "SELECT available FROM tables";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
      if ($row['available'] > 0) {
        $available_slots[] = date("H:i", $time);
      } else {
        $available_slots[] = date("H:i", strtotime("+1 hour", $time));
      }
    }
  }

// Evening
for ($time = $open_time_evening; $time <= $close_time_evening; $time = strtotime("+15 minutes", $time)) {
  if (strtotime("+1 hour", $time) > $close_time_evening) {
  continue;
  }
  if (!in_array(date("H:i", $time), $booked_slots)) {
    $query = "SELECT available FROM tables";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
      if ($row['available'] > 0) {
        $available_slots[] = date("H:i", $time);
      } else {
        $available_slots[] = date("H:i", strtotime("+1 hour", $time));
      }
    }
  }

// Return the available slots as a PHP array
header('Content-Type: application/json');
echo json_encode($available_slots);
mysqli_close($conn);
?>