<?php

include_once '../includes/dbh.inc.php';

if(isset($_GET['date'])) {
  $date_arr = explode("/", $_GET['date']);
  if(!checkdate($date_arr[1], $date_arr[0], $date_arr[2])){
      echo "Date invalide";
      exit();
  }
  $date = date("d/m/Y", strtotime($_GET['date']));
} else {
  echo "Merci de choisir une date";
  exit();
}


// Retrieve the booked slots for the selected date
$query = "SELECT time FROM booking WHERE date = '" . date('Y-m-d', strtotime($date)) . "'";
$result = mysqli_query($conn, $query);
$booked_slots = array();
while ($row = mysqli_fetch_assoc($result)) {
    $booked_slots[] = $row['time'];
}

// Retrieve the opening and closing hours for the selected date
$query = "SELECT open_morning, close_morning, open_evening, close_evening, status FROM restauranthours WHERE day = DAYNAME('" . date('Y-m-d', strtotime($date)) . "')";

$result = mysqli_query($conn, $query);
if($result){
  $row = mysqli_fetch_assoc($result);
  $open_time_morning = strtotime($row['open_morning']);
  $close_time_morning = strtotime($row['close_morning']);
  $open_time_evening = strtotime($row['open_evening']);
  $close_time_evening = strtotime($row['close_evening']);
  $status = $row['status'];
  if($status == "closed"){
    echo "Le restaurant est fermé le ".date("l", strtotime($date));
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