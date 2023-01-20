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



// RECUPERER LES DONNEES DU SCRIPT AJAX

include_once '../includes/dbh.inc.php';

if(isset($_POST['selected_date'])) {
  $selected_date = $_POST['selected-date'];
  var_dump($selected_date);
  $day = date('1', strtotime($selected_date));
  $query = "SELECT open_morning, close_morning, open_evening, close_evening, status FROM  restauranthours WHERE day='$day'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $open_morning = $row['open_morning'];
  $close_morning = $row['close_morning'];
  $open_evening = $row['open_evening'];
  $close_evening = $row['close_evening'];
  $status = $row['status'];
}

// Récupérer les créneaux de réservation déjà réservés

$query = "SELECT time FROM booking WHERE date = '$selected_date'";
$result = mysqli_query($conn, $query);
$booked_times = array();
while($row = mysqli_fetch_assoc($result)){
  $booked_times[] = $row['time'];
}

// Récupérer le nombre de tables disponibles
$query = "SELECT available FROM tables";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$available = $row['available'];

echo '<div id="available-times">';

if ($status == 'closed') {
  echo '<p>Le restaurant est fermé ce jour.</p>';
} else {
  for ($i=0; $i < 24; $i++) {
    for ($j=0; $j < 4 ; $j++) {
    $time = $i . ":" . str_pad(($j * 15), 2, "0", STR_PAD_LEFT);
    if ($i >= $open_morning && $i < $close_morning || $i >= $open_evening && $i < $close_evening) {
      if (in_array($time, $booked_times) || $available_tables == 0) {
        echo "<button class='btn btn-secondary' disabled>" . $time . "</button>";
      } else {
        echo "<button class='btn btn-primary'>" . $time . "</button>";
      }
    } else {
      echo "<button class='btn btn-secondary' disabled>" . $time . "</button>";
    }}}
  }
  echo '</div>';
