<?php
  session_start();
  if(isset($_SESSION['email'])) {
    $is_admin = $_SESSION['email'] == 'admin@localhost.com';
  }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Quai Antique</title>

    <!-- Bootstrap CSS / FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

  </head>

  <body>
    <div class="navbar-box">
      <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="../pages/index.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../pages/carte.php">Carte</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../pages/menu.php">Menus</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../pages/booking.php">Réserver</a>
              </li>

              <?php
                if (isset($_SESSION["user_id"])) {
                  if ($is_admin) {
                    echo "<li class='nav-item'><a class='nav-link' href='http://localhost/STUDI/ECF/SiteWeb/front/src/pages/admin.php'>ADMIN</a></li> ";
                  }
                  echo "<li class='nav-item'><a class='nav-link' href='../../../includes/logout.inc.php'>Déconnection</a></li>";
                } else {
                echo "<li class='nav-item'><a class='nav-link' href='../pages/signup.php'>Inscription</a></li> ";
                echo "<li class='nav-item'><a class='nav-link' href='../pages/login.php'>Se connecter </a></li>";
                }
              ?>

              <?php
                if (isset($_SESSION["user_id"])) {
                  echo "<li class='nav-item'><p class='nav-link'>" . $_SESSION["email"] . "</p></li>";
                }
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>

