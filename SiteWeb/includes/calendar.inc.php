<?php

include_once '../includes/dbh.inc.php';

$frDates = ['Monday' => 'Lundi', 'Tuesday' => 'Mardi', 'Wednesday' => 'Mercredi', 'Thursday' => 'Jeudi', 'Friday' => 'Vendredi', 'Saturday' => 'Samedi', 'Sunday' => 'Dimanche'];

$date = $_GET['date'];
$date = str_replace('/', '-', $date);
$timestamp = strtotime($date);
$date = $frDates[date('l', $timestamp)];
$formattedDate = date('Y-m-d', $timestamp);

// Retrieve the booked slots for the selected date
$query = "SELECT time FROM booking WHERE date = '" . $formattedDate . "';";
$result = mysqli_query($conn, $query);
$booked_slots = array();
while ($row = mysqli_fetch_assoc($result)) {
    $booked_slots[] = $row['time'];
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

for ($time = $open_time_morning; $time <= $close_time_morning; $time = strtotime("+15 minutes", $time)) {
  if (strtotime("+1 hour", $time) > $close_time_morning) {
      // Skip the iteration or break out of the loop
      continue;
  }
  if (!in_array($time, $booked_slots)) {
      $query = "SELECT available FROM tables";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      if ($row['available'] > 0) {
          $available_slots[] = date("H:i:s", $time);
      }
  }
}

for ($time = $open_time_evening; $time <= $close_time_evening; $time = strtotime("+15 minutes", $time)) {
  if (strtotime("+1 hour", $time) > $close_time_evening) {
      // Skip the iteration or break out of the loop
      continue;
  }
  if (!in_array($time, $booked_slots)) {
      $query = "SELECT available FROM tables";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      if ($row['available'] > 0) {
          $available_slots[] = date("H:i:s", $time);
      }
  }
}


// Return the available slots as a PHP array
header('Content-Type: application/json');
echo json_encode($available_slots);
mysqli_close($conn);
?>