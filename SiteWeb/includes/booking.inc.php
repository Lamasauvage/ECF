<?php

include_once '../includes/dbh.inc.php';

if (isset($_SESSION['email']) && $_SESSION['email'] == 'admin@localhost.com') {

// Update number of tables

  $new_value = $_POST['table_count'];

  if (!empty($new_value) && is_numeric($new_value)) {
  $select_query = "SELECT * FROM tables";
  $result = mysqli_query($conn, $select_query);
  $row_count = mysqli_num_rows($result);
  $table_count = $row['available'];
  var_dump($table_count);exit();

  if ($row_count == 0) {
    $query = "INSERT INTO tables (available) VALUES ('$new_value')";
    } else {
    $query = "UPDATE tables SET available='$new_value'";
    }
    $result = mysqli_query($conn, $query);
  }
}

header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/component/admin/adminPanel.php");
$conn->close();

// Add a new booking

include_once '../includes/dbh.inc.php';

if (isset($_POST['date']) && isset($_POST['time']) && isset($_POST['name'])  && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['allergy']) && isset($_POST['allergy_type'])) {
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $time = mysqli_real_escape_string($conn, $_POST['time']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $allergy = mysqli_real_escape_string($conn, $_POST['allergy']);
  $allergy_type = mysqli_real_escape_string($conn, $_POST['allergy_type']);
  var_dump($date, $time, $name, $email, $phone, $allergy, $allergy_type);

  $sql = "INSERT INTO booking (date, time, name, email, phone, allergy, allergy_type) VALUES ('$date', '$time', '$name', '$email', '$phone', '$allergy', '$allergy_type');";
  mysqli_query($conn, $sql);
} exit();