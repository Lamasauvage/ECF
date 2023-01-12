<?php

if (isset($_POST['submit'])) {
  
  $newFileName = $_POST['filename'];
  if (empty('newFileName')) {
    $newFileName = "gallery";
  } else {
    $newFileName = strtolower(str_replace(" ", "-", $newFileName));
  }
  $imageTitle = $_POST['filetitle'];
  $imageDescription = $_POST['filedesc'];
  
  $file = $_FILES['file'];

  $fileName = $file["name"];
  $fileType = $file["type"];
  $fileTempName = $file["tmp_name"];
  $fileError = $file["error"];
  $fileSize = $file["size"];

  $fileExt = explode(".", $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array("jpg", "jpeg", "png",);

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 20000000) {
        $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
        $fileDestination = "../img/gallery/" . $imageFullName;

        include_once "../includes/dbh.inc.php";

        if (empty($imageTitle) || empty($imageDescription)) {
          header("Location: ../../../front/src/component/gallery.php?upload=empty");
          exit();
        } else {

          // Récupérer tous les enregistrements de la table gallery et les trier par ordre croissant d'ID
          $sql = "SELECT * FROM gallery ORDER BY idGallery ASC";
          $result = mysqli_query($conn, $sql);

          // Initialiser le compteur d'enregistrements
          $count = 0;

          // Parcourir chaque enregistrement de la table
          while ($row = mysqli_fetch_assoc($result)) {
            // Vérifier si l'ID de l'enregistrement actuel est égal à l'ID attendu
            if ($row['idGallery'] != $count + 1) {
              // Mettre à jour l'ID de l'enregistrement actuel avec l'ID attendu
              $id = $row['idGallery'];
              $newId = $count + 1;
              $sql = "UPDATE gallery SET idGallery = $newId WHERE idGallery = $id";
              mysqli_query($conn, $sql);
            }
            // Incrémenter le compteur d'enregistrements
            $count++;
          }

          // Récupérer le nombre d'enregistrements de la table
          $sql = "SELECT * FROM gallery;";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
          } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $rowCount = mysqli_num_rows($result);
            $setImageOrder = $rowCount + 1;

            $sql = "INSERT INTO gallery (titleGallery, descriptionGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "Echec à la connexion SQL";
            } else {
              mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDescription, $imageFullName, $setImageOrder);
              mysqli_stmt_execute($stmt);

              move_uploaded_file($fileTempName, $fileDestination);

              header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/index.php?upload=success");
            }
          }
        }
      } else {
        echo "Le fichier est trop volumineux. La taille maximale est de 20 Mo.";
        exit();
      }
    } else {
      echo "Une erreur est survenue, veuillez réessayer";
      exit();
    }
  } else {
    echo "Extension de fichier non reconnu";
    exit();
  }
}