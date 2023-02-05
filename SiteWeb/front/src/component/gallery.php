<?php
  if(isset($_SESSION['email'])) {
    $is_admin = $_SESSION['email'] == 'admin@localhost.com';
  }
?>

<section class="gallery-links">
  <div class="wrapper">
    <h2>Gallerie</h2>

    <div class="gallery-container">
      <?php
      include_once '../../../includes/dbh.inc.php';

      $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Echec à la connexion SQL";
      } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(isset($_SESSION['email']) && $_SESSION['email'] == $is_admin) {
          while ($row = mysqli_fetch_assoc($result)) {
                  echo '<a href="javascript:void(0)">
                    <div style="background-image:
                    url(../../../img/gallery/'.$row["imgFullNameGallery"].');"></div>
                    <h3>'.$row["titleGallery"].' ('.$row["idGallery"].')</h3>
                    <p>'.$row["descriptionGallery"].'</p>
                    </a>';
          }
        } else {
          while ($row = mysqli_fetch_assoc($result)) {
                  echo '<a href="javascript:void(0)">
                    <div style="background-image:
                    url(../../../img/gallery/'.$row["imgFullNameGallery"].');"></div>
                    <h3>'.$row["titleGallery"].'</h3>
                    <p>'.$row["descriptionGallery"].'</p>
                    </a>';
          }
        }
      }
      ?>

    <?php
    if(isset($_SESSION['email']) && $_SESSION['email'] == $is_admin) {
      echo '<div class="gallery-upload">
      <h2>Upload</h2>
      <form action="../../../includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
        <input type="text" name="filename" placeholder="Nom du fichier...">
        <input type="text" name="filetitle" placeholder="Titre de l\'image...">
        <input type="text" name="filedesc" placeholder="Description...">
        <input type="file" name="file">
        <button type="submit" name="submit">Envoyer</button>
      </form>

      <form method="post" action="../../../includes/deleteImage.inc.php">
        <label for="image_id">Entrez l\'ID de l\'image à supprimer :</label><br>
        <input type="text" id="id" name="id"><br>
        <input type="submit" value="Supprimer l\'image">
      </form>
      </div>';
    }

    ?>
    </div>
  </section>