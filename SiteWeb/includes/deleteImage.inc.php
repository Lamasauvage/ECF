<?php

require_once 'dbh.inc.php';

$id = $_POST['id'];

$sql = "SELECT imgFullNameGallery FROM gallery WHERE idGallery='$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$filename = $row['imgFullNameGallery'];

$sql = "DELETE FROM gallery WHERE idGallery='$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
  unlink("../img/gallery/$filename");
  header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/index.php?delete=success");
  echo "Image supprimée avec succès!";
} else {
  echo "Erreur lors de la suppression de l'image.";
}
?>