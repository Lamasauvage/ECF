<?php

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

  // Get the current restaurant capacity
  $sql_capacity = "SELECT capacity FROM restaurant_capacity";
  $result_capacity = mysqli_query($conn, $sql_capacity);
  $capacity = mysqli_fetch_assoc($result_capacity)['capacity'];

  // Add new booking to tables
  $sql_table = "INSERT INTO tables (table_id) VALUES (NULL)";
  $result_table = mysqli_query($conn, $sql_table);

  if ($result_table) {
      $table_id = mysqli_insert_id($conn);

      // Update the restaurant capacity by subtracting the number of guests from the booking
      $sql_update_capacity = "UPDATE restaurant_capacity SET capacity = capacity - $guests";
      $result_update_capacity = mysqli_query($conn, $sql_update_capacity);

      if ($result_update_capacity) {
          // Decrease the number of available tables
          $sql_update_tables = "UPDATE tables SET available = available - 1";
          $result_update_tables = mysqli_query($conn, $sql_update_tables);

          if ($result_update_tables) {
              // Calculate the time when the booking will be invalid
              $valid_until = date('Y-m-d H:i:s', strtotime("$formattedDate $time +1 hour"));

              // Insert the booking
              $sql_insert_booking = "INSERT INTO booking (date, time, name, email, phone, guests, allergy, allergy_type, table_id, valid_until) VALUES ('$formattedDate', '$time', '$name', '$email', '$phone', '$guests', '$allergy', '$allergy_type', '$table_id', '$valid_until')";
              $result_insert_booking = mysqli_query($conn, $sql_insert_booking);

              if ($result_insert_booking) {
                  // Booking made successfully
                  echo "success";
              } else {
                  // Error making the booking
                  echo "error";
              }
          } else {
              // Error updating available tables
              echo "error";
          }
      } else {
          // Error updating restaurant capacity
          echo "error";
      }
  }
}
