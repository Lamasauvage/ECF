<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../includes/dbh.inc.php';
var_dump($_POST);

// Add a new booking

if (isset($_POST['date']) && isset($_POST['time']) && isset($_POST['name'])  && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['guests']) && isset($_POST['allergy']) && isset($_POST['allergy_type'])) {
  $formattedDate = mysqli_real_escape_string($conn, $_POST['date']);
  $time = mysqli_real_escape_string($conn, $_POST['time']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $guests = mysqli_real_escape_string($conn, $_POST['guests']);
  $allergy = mysqli_real_escape_string($conn, $_POST['allergy']);
  $allergy_type = mysqli_real_escape_string($conn, $_POST['allergy_type']);

  if ($guests == 'custom_value') {
    $guests = mysqli_real_escape_string($conn, $_POST['custom_value']);
  }

  $sql_update = "UPDATE tables SET available = available - 1";
  $result_update = mysqli_query($conn, $sql_update);
  if ($result_update) {
    // Insert the booking
    $sql = "INSERT INTO booking (date, time, name, email, phone, guests, allergy, allergy_type) VALUES ('$formattedDate', '$time', '$name', '$email', '$phone', '$guests', '$allergy', '$allergy_type')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
    exit();
  } else {
    echo "error";
    exit();
  }
}

?>
