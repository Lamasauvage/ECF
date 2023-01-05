<?php

// Connexion à la base de données
require_once 'dbh.inc.php';

echo 'test';
echo $_POST['submit'];

if (isset($_POST['submit']) || true) {
  // Récupération de l'ID de l'image à supprimer
  $id = $_POST['id'];

  // Requête SQL pour récupérer le nom du fichier associé à l'ID de l'image
  $sql = "SELECT imgFullNameGallery FROM gallery WHERE idGallery='$id'";
  $result = mysqli_query($conn, $sql);

  // Récupération du nom du fichier
  $row = mysqli_fetch_assoc($result);
  $fileName = $row['imgFullNameGallery'];

  // Requête SQL pour supprimer l'image de la base de données
  $sql = "DELETE FROM gallery WHERE idGallery='$id'";
  $result = mysqli_query($conn, $sql);

  // Vérification de la réussite de la requête
  if ($result) {
    // Suppression de l'image du serveur
    unlink("../../../front/src/component/gallery/$id.jpg");
    echo "Image supprimée avec succès!";
  } else {
    echo "Erreur lors de la suppression de l'image.";
  }
}
?>