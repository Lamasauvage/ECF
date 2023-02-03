<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../includes/dbh.inc.php';
var_dump($_POST);

// Add a new booking

if (isset($_POST['date']) && isset($_POST['time']) && isset($_POST['name'])  && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['guests']) && isset($_POST['allergy']) && isset($_POST['allergy_type'])) {
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $formattedDate = date('Y-m-d', strtotime($date));
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


  $sql = "INSERT INTO booking (date, time, name, email, phone, guests, allergy, allergy_type) VALUES ('$formattedDate', '$time', '$name', '$email', '$phone', '$guests', '$allergy', '$allergy_type')";

echo $sql;

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "success";
} else {
    echo "error";
}

} exit();

?>

<!--
//Ajax call success: array(8) {
  ["date"]=>
  string(69) "Sat Feb 11 2023 00:00:00 GMT+0100 (heure normale d’Europe centrale)"
  ["time"]=>
  string(5) "20:30"
  ["name"]=>
  string(8) "Juliette"
  ["email"]=>
  string(21) "allergyfish@gmail.com"
  ["phone"]=>
  string(10) "0619420126"
  ["guests"]=>
  string(1) "3"
  ["allergy"]=>
  string(3) "yes"
  ["allergy_type"]=>
  string(4) "fish"
}
INSERT INTO booking (date, time, name, email, phone, guests, allergy, allergy_type) VALUES ('1970-01-01', '20:30', 'Juliette', 'allergyfish@gmail.com', '0619420126', '3', 'yes', 'fish')success