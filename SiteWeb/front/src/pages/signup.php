<?php include_once '../templates/header.php'; ?>
  <style>
  <?php include "../../../css/style.css"; ?>
  </style>

    <section class="signup-form">
      <h2>Création de compte</h2>
      <div class="signup-form-form">
        <form action="includes/signup.inc.php" method="POST">

          <label for="email"><b>Email</b></label>
          <input type="text" name="email" placeholder="Email">

          <label for="password"><b>Mot de passe</b></label>
          <input type="password" name="pwd" placeholder="Mot de passe">

          <label for="password"><b>Confirmation du mot de passe</b></label>
          <input type="password" name="pwdrepeat" placeholder="Mot de passe">

          <button type="submit" name="submit">Créer un compte</button>
          <button type="reset">Annuler</button>
          
        </form>
      </div>
    </section>
    
  <?php include_once '../templates/footer.php'; ?>
