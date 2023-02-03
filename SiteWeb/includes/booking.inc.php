<?php

include_once '../includes/dbh.inc.php';

// Add a new booking

if (isset($_POST['date']) && isset($_POST['time']) && isset($_POST['name'])  && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['allergy']) && isset($_POST['allergy_type'])) {
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $time = mysqli_real_escape_string($conn, $_POST['time']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $allergy = mysqli_real_escape_string($conn, $_POST['allergy']);
  $allergy_type = mysqli_real_escape_string($conn, $_POST['allergy_type']);


  $sql = "INSERT INTO booking (date, time, name, email, phone, allergy, allergy_type) VALUES ('$date', '$time', '$name', '$email', '$phone', '$allergy', '$allergy_type');";
  mysqli_query($conn, $sql);
} exit();