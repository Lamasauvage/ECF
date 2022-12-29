<!-- Header + Navbar -->
<?php include_once '../templates/header.php'; ?>
<style>
<?php include "../../../css/style.css"; ?>
</style>

  <?php 
    if (isset($_SESSION["useruid"])) {
      echo "<p>Bonjour " ";
      echo "<li><a href='../../../includes/logout.inc.php'>Déconnection</a></li>";
      }
      else {
      echo "<li><a href='../pages/signup.php'>Inscription</a></li> ";
      echo "<li><a href='../pages/login.php'>Se connecter</a></li>";
      }

  ?>

  <div class="banner-image">LE QUAI ANTIQUE</div>

<!-- Gallery -->
<?php include_once '../component/gallery.php'; ?>

<?php include_once '../templates/footer.php'; ?>
