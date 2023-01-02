<?php 
  $_SESSION['email'] = "Admin";
  ?>

<section class="gallery-links">
  <div class="wrapper">
    <h2>Gallery</h2>

    <div class="gallery-container">
      <a href="#">
        <div></div>
        <h3>Title</h3>
        <p>Description</p>
      </a>
      <a href="#">
        <div></div>
        <h3>Title</h3>
        <p>Description</p>
      </a>
      <a href="#">
        <div></div>
        <h3>Title</h3>
        <p>Description</p>
      </a>
      <a href="#">
        <div></div>
        <h3>Title</h3>
        <p>Description</p>
      </a>
      <a href="#">
        <div></div>
        <h3>Title</h3>
        <p>Description</p>
      </a>
      <a href="#">
        <div></div>
        <h3>Title</h3>
        <p>Description</p>
      </a>
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
      </form>
    </div>';
    }

     
    ?>

  </section>