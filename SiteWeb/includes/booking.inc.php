<?php
session_start();

if (isset($_SESSION['email']) && $_SESSION['email'] == 'admin@localhost.com') {

  $new_value = $_POST['table_count'];

  if (!empty($new_value) && is_numeric($new_value)) {
  include_once '../includes/dbh.inc.php';

  $select_query = "SELECT * FROM tables";
  $result = mysqli_query($conn, $select_query);
  $row_count = mysqli_num_rows($result);

  if ($row_count == 0) {
    $query = "INSERT INTO tables (available) VALUES ('$new_value')";
    } else {
    $query = "UPDATE tables SET available='$new_value'";
    }
    $result = mysqli_query($conn, $query);
    if ($result) {
    echo "Le nombre de tables disponibles a été mis à jour avec succès.";
    } else {
    echo "Une erreur est survenue lors de la mise à jour de la table : " . $conn->error;
    }
  } else {
    echo "La valeur envoyée n'est pas valide. Veuillez entrer un nombre.";
  }
}
$conn->close();