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
              echo "Image téléchargé.";
            }
          }
        }
      } else {
        echo "Votre fichier est trop volumineux";
        exit();
      }
    } else {
      echo "Il y a eu une erreur lors de l'upload de votre fichier";
      exit();
    }
  } else {
    echo "Vous ne pouvez pas uploader de fichier de ce type";
    exit();
  }
}
