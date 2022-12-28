<?php include_once '../templates/header.php'; ?>
  <style>
  <?php include "../../../css/style.css"; ?>
  </style>

    <section class="signup-form">
      <h2>Connexion</h2>

      <form action="login.inc.php" method="POST">
        <label for="email"><b>Email</b></label>
        <input type="text" name="email" placeholder="Email">

        <label for="password"><b>Mot de passe</b></label>
        <input type="password" name="pwd" placeholder="Mot de passe">

        <button type="submit" name="submit">Connexion</button>
      </form>
    </section>

    

  <?php include_once '../templates/footer.php'; ?>
