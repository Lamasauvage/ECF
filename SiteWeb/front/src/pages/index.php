<!-- Header + Navbar -->
<?php include_once '../templates/header.php'; ?>

<style>
<?php include "../../../css/style.css"; ?>
</style>

<!-- Banner image -->

<div class="banner-image">
  <h1>LE QUAI ANTIQUE</h1>
</div>

<?php 
    if (isset($_SESSION["user_id"])) {
      echo "<p>Bonjour " . $_SESSION["email"] . "</p>";
      }
  ?>

<!-- Text -->

<div id=text-between>
  <h2>Découvrez les spécialités gourmandes de la Savoie le temps d'un repas</h2>
</div>

<!-- Gallery -->

<?php include_once '../component/gallery.php'; ?>

<!-- Booking -->

<a href='http://localhost/STUDI/ECF/SiteWeb/front/src/pages/booking.php'>
  <input type="submit" value="Réserver votre table" class="button">
</a>

<!-- Footer -->

<?php include_once '../templates/footer.php'; ?>
