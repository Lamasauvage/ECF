
<!-- Header + Navbar -->
<?php include_once '../templates/header.php'; ?>

<style>
<?php include "../../../css/style.css"; ?>
</style>

  <?php 
    if (isset($_SESSION["useruid"])) {
      echo "<p>Bonjour " . $_SESSION["useruid"] . "</p>";
      }
  ?>

<!-- Banner image -->

  <div class="banner-image">
    <h1>LE QUAI ANTIQUE</h1>
  </div>

<!-- Gallery -->

<?php include_once '../component/gallery.php'; ?>

<!-- Footer -->

<?php include_once '../templates/footer.php'; ?>
