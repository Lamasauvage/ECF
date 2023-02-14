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

  $sql_table = "INSERT INTO tables (table_id) VALUES (NULL)";
  $result_table = mysqli_query($conn, $sql_table);
  if ($result_table) {
      $table_id = mysqli_insert_id($conn);

      // Decrease the number of available tables
      $sql_update = "UPDATE tables SET available = available - 1";
      $result_update = mysqli_query($conn, $sql_update);
      if ($result_update) {
          // Calculate the time when the booking will be invalid
          $valid_until = date('Y-m-d H:i:s', strtotime("$formattedDate $time +1 hour"));

          // Insert the booking
          $sql = "INSERT INTO booking (date, time, name, email, phone, guests, allergy, allergy_type, table_id, valid_until) VALUES ('$formattedDate', '$time', '$name', '$email', '$phone', '$guests', '$allergy', '$allergy_type', '$table_id', '$valid_until')";
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
}
?>
