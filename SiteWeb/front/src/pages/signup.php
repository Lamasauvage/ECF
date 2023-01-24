<?php include_once '../templates/header.php'; ?>
  <style>
  <?php include "../../../css/style.css"; ?>
  </style>

    <section class="signup-form">
      <h2>Création de compte</h2>
      <div class="signup-form-form">
        <form action="http://localhost/STUDI/ECF/SiteWeb/includes/signup.inc.php" method="POST">

          <label for="email"><b>Email</b></label>
          <input type="text" name="email" placeholder="Email">

          <label for="password"><b>Mot de passe</b></label>
          <input type="password" name="pwd" placeholder="Mot de passe">

          <label for="password"><b>Confirmation du mot de passe</b></label>
          <input type="password" name="pwdRepeat" placeholder="Mot de passe">

          <!-- Form to indicate allergy -->
          <label for="allergy">Avez-vous des allergies alimentaires ?</label>
          <select name="allergy" id="allergy">
              <option value=""></option>
              <option value="yes">Oui</option>
              <option value="no">Non</option>
          </select>

          <div id="allergy-form" style="display:none;">
            <label for="allergy_type">Préciser le type d'allergie :</label>
            <select name="allergy_type" id="allergy_type">
              <option value=""></option>
              <option value="gluten">Gluten</option>
              <option value="lait">Lait</option>
              <option value="eggs">Oeufs</option>
              <option value="peanut">Arachide</option>
              <option value="nuts">Fruit à coque</option>
              <option value="seafood">Fruit de la mer</option>
              <option value="mollusc">Mollusques</option>
              <option value="fish">Poissons</option>
              <option value="celery">Céleri</option>
              <option value="soja">Soja</option>
              <option value="sesame">Sésame</option>
              <option value="lupin">Lupin</option>
              <option value="sulfite">Sulfites</option>
              <option value="other-allergy">Autres</option>
            </select>
            <input type="text" id="other-allergy" name="other-allergy" style="display:none">
          </div>

          <label for="guests">Renseigner le nombre de couvert par défaut à chaque réservation</label>
          <input type="number" name="guests" min="1" style="width: 60px;">

          <button type="submit" name="submit">Créer un compte</button>
          <button type="reset">Annuler</button>

        </form>
      </div>

<!-- JS SCRIPT TO SHOW/HIDE FORM -->
<script>
let select2 = document.getElementById("allergy");
let form = document.getElementById("allergy-form");
let allergyType = document.getElementById("allergy_type");
let allergyOther = document.getElementById("other-allergy");

select2.addEventListener("change", function(){
  if(select2.value === "yes"){
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
});

allergyType.addEventListener("change", function(){
  if(allergyType.value === "other-allergy"){
    allergyOther.style.display = "inline-block";
  } else {
    allergyOther.style.display = "none";
  }
});

</script>


<?php
  // Error Messages 
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Veuillez renseigner tous les champs</p>";
      }
      else if ($_GET["error"] == "invalidemail") {
        echo "<p>Email invalide</p>";
      }
      else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Les mots de passe ne correspondent pas</p>";
      }
      else if ($_GET["error"] == "emailalreadyexists") {
        echo "<p>L'email existe déjà</p>";
      }
      else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Désolé, quelque chose s'est mal passé !</p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p>Votre compte a été crée avec succès !</p>";
      }
    }
  ?>

  </section>

  <?php include_once '../templates/footer.php'; ?>
