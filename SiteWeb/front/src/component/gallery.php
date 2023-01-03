<?php
  // session_start();
  // define('EMAIL_ADMIN', 'admin@example.com');

  // // Vérifiez si l'utilisateur est l'administrateur
  // $is_admin = $_SESSION['email'] === EMAIL_ADMIN;
  ?>


<?php 
  $_SESSION['email'] = "Admin";
  ?>

<section class="gallery-links">
  <div class="wrapper">
    <h2>Gallery</h2>

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

        while ($row = mysqli_fetch_assoc($result)) {
          echo '<a href="#">
            <div style="background-image: url(../img/gallery/'.$row["imgFullNameGallery"].');"></div>
            <h3>'.$row["titleGallery"].'</h3>
            <p>'.$row["descriptionGallery"].'</p>
            </a>';
          }
        }
      ?>
    </div>

    <?php
    if(isset($_SESSION['email'])) {
      echo '<div class="gallery-upload">
      <form action="../../../includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
        <input type="text" name="filename" placeholder="Nom du fichier...">
        <input type="text" name="filetitle" placeholder="Titre de l\'image...">
        <input type="text" name="filedesc" placeholder="Description...">
        <input type="file" name="file">
        <button type="submit" name="submit">Envoyer</button>
        <button type="submit" name="delete">Supprimer</button>
      </form>
    </div>';
    }
    ?>

  </section>

