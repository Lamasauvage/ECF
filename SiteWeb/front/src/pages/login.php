<?php include_once '../templates/header.php'; ?>
  <style>
  <?php include "../../../css/style.css"; ?>
  </style>

    <section class="signup-form">
      <h2>Connexion</h2>

      <form action="../../../includes/login.inc.php" method="POST">
        <label for="email"><b>Email</b></label>
        <input type="text" name="email" placeholder="Email">

        <label for="password"><b>Mot de passe</b></label>
        <input type="password" name="pwd" placeholder="Mot de passe">

        <button type="submit" name="submit">Connexion</button>
        <p>Vous n'avez pas encore de compte ?
          <a href="../pages/signup.php">S'inscrire</a>
        </p>
      </form>

      <?php

      // DISPLAY ERROR MESSAGES

      if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
          echo "<p>Veuillez renseigner tous les champs</p>";
        }
        else if ($_GET["error"] == "wronglogin") {
          echo "<p>L'email ou le mot de passe est incorrect</p>";
        }
      }
    ?>
    </section>

    

  <?php include_once '../templates/footer.php'; ?>
