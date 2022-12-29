<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Quai Antique</title>
  </head>

  <body>
    <div class="wrapper">
      <a href="index.php"><img src="../../../img/logo.jpg" alt="Logo" id="logo"></a>
      <ul class="navbar">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="menu.php">Notre Carte</a></li>
        <li><a href="booking.php">Réserver</a></li>
        <?php
          if (isset($_SESSION["useruid"])) {
            echo "<li><a href='profile.php'>Profil</a></li> ";
            echo "<li><a href='logout.php'>Déconnection</a></li>";
          }
          else {
            echo "<li><a href='signup.php'>Inscription</a></li> ";
            echo "<li><a href='login.php'>Se connecter</a></li>";
          }
        ?>
        
      </ul>
    </div>
