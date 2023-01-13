<?php


// Récupérez les données de formulaire
$monday_open = mysqli_real_escape_string($conn, $_POST['monday-open']);
$monday_close = mysqli_real_escape_string($conn, $_POST['monday-close']);

// Créez la requête SQL pour mettre à jour les heures d'ouverture
$sql = "UPDATE hours SET open='$monday_open', close='$monday_close' WHERE day='Monday'";

// Exécutez la requête
if (mysqli_query($conn, $sql)) {
  echo "Les heures d'ouverture ont été mises à jour avec succès.";
} else {
  echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
}
