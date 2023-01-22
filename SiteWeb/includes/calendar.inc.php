<?php

include_once '../includes/dbh.inc.php';

if(isset($_GET['date'])) {
  $date_arr = explode("/", $_GET['date']);
  if(!checkdate($date_arr[1], $date_arr[0], $date_arr[2])){
      echo "Invalid date selected";
      exit();
  }
  $date = date("Y-m-d", strtotime($_GET['date']));
} else {
  echo "Please select a date!!";
  exit();
}


// Retrieve the booked slots for the selected date
$query = "SELECT time FROM booking WHERE date = '$date'";
$result = mysqli_query($conn, $query);
$booked_slots = array();
while ($row = mysqli_fetch_assoc($result)) {
    $booked_slots[] = $row['time'];
}

// Retrieve the opening and closing hours for the selected date
$query = "SELECT open_morning, close_evening FROM restauranthours WHERE day = DAYNAME('".date("Y-m-d", strtotime($date))."')";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$open_time = $row['open_morning'];
$close_time = $row['close_evening'];

// Initialize an array to store the available slots
$available_slots = array();

// Iterate through the hours of the day

$open_time = strtotime($open_time);
$close_time = strtotime($close_time);
for ($time = $open_time; $time < $close_time - 1; $time = strtotime("+15 minutes", $time)) {
    // Check if the current hour is available
    if (!in_array($time, $booked_slots)) {
        // Check if there are any available tables
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