<?php
session_start();

include_once '../includes/dbh.inc.php';

if (isset($_SESSION['email']) && $_SESSION['email'] == 'admin@localhost.com') {

// Update number of tables

  $new_value = $_POST['table_count'];

  if (!empty($new_value) && is_numeric($new_value)) {


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
      // AFFICHER LES MESSAGES (NE FONCTIONNE PAS)
    echo "Le nombre de tables disponibles a été mis à jour avec succès.";
    } else {
    echo "Une erreur est survenue lors de la mise à jour de la table : " . $conn->error;
    }
  } else {
    echo "La valeur envoyée n'est pas valide. Veuillez entrer un nombre.";
  }
}

header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/booking.php");
$conn->close();

// ----------------------------------------  


