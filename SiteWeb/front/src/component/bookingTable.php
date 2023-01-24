<?php

include_once '../../../includes/dbh.inc.php';

    if (isset($_SESSION['user_id'])) {
      echo "<p>Bonjour " . $_SESSION["user_id"] . "</p>";
      $query = "SELECT email, guests, allergy, allergy_type FROM users WHERE id = '" . $_SESSION['user_id'] . "'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);

      $email = $row['email'];
      $guests = $row['guests'];
      $allergy = $row['allergy'];
      $allergy_type = $row['allergy_type'];

      mysqli_close($conn);
    }
?>

<!-- Form to indicate name/email and phone -->

<form>
  <label for="name">Nom:</label>
  <input type="text" id="name" name="name">

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" value="<?php echo $email;?>">

  <label for="phone">Téléphone:</label>
  <input type="tel" id="phone" name="phone">
</form>

<!-- Form to indicate the number of covers -->

<form>
  <label for="guests">Nombre de couverts:</label>
  <select name="guests" id="guests">
    <option value="1" <?php if($guests == 1) echo "selected"; ?>>1</option>
    <option value="2" <?php if($guests == 2) echo "selected"; ?>>2</option>
    <option value="3" <?php if($guests == 3) echo "selected"; ?>>3</option>
    <option value="4" <?php if($guests == 4) echo "selected"; ?>>4</option>
    <option value="5" <?php if($guests == 5) echo "selected"; ?>>5</option>
    <option value="6" <?php if($guests == 6) echo "selected"; ?>>6</option>
    <option value="7" <?php if($guests == 7) echo "selected"; ?>>7</option>
    <option value="8" <?php if($guests == 8) echo "selected"; ?>>8</option>
    <option value="9" <?php if($guests == 9) echo "selected"; ?>>9</option>
    <option value="10" <?php if($guests == 10) echo "selected"; ?>>10</option>
    <option value="custom-value">Autre</option>
  </select>
  <input type="number" id="custom-value" name="custom-value" min="1" style="display:none; width:50px" value="<?php if($guests > 10) echo $guests; ?>">
</form>


<!-- Manual entry form in case there are +7 persons -->

<script>
let select = document.getElementById("guests");
let input = document.getElementById("custom-value");
if (<?php echo $guests; ?> > 10){
    input.style.display = "inline-block";
}
select.addEventListener("change", function(){
  if(select.value === "custom-value"){
    input.style.display = "inline-block";
  } else {
    input.style.display = "none";
  }
});
</script>

<!-- Form to indicate allergy -->

<form>
  <label for="allergy">Avez-vous des allergies alimentaires ?</label>
  <select name="allergy" id="allergy">
    <option value=""></option>
    <option value="yes">Oui</option>
    <option value="no">Non</option>
  </select>
</form>


<?php
// $frAllergy = array(
//  "gluten" => "Gluten",
//  "milk" => "Lait",
//  "eggs" => "Oeufs",
//  "peanut" => "Arachide",
//  "nuts" => "Fruit à coque",
//  "seafood" => "Fruit de la mer",
//  "mollusc" => "Mollusques",
//  "fish" => "Poissons",
//  "celery" => "Céleri",
//  "soja" => "Soja",
//  "sesame" => "Sésame",
//  "lupin" => "Lupin",
//  "sulfite" => "Sulfites"
// );
?> 

<form id="allergy-form" style="display:none;">
  <label for="allergy-type">Préciser le type d'allergie :</label>
  <select name="allergy-type" id="allergy-type">
    <option value=""></option>
    
   <?php 
    //foreach ($frAllergy as $key => $value) {
    //  echo "<option value='" . $key . "'";
    //  if($allergy_type == $key) echo "selected";
    //  echo ">" . $value . "</option>";
    // }; ?> 

    <option value="gluten" <?php if($allergy_type == "gluten") echo "selected"; ?>>Gluten</option>
    <option value="milk" <?php if($allergy_type == "milk") echo "selected"; ?>>Lait</option>
    <option value="eggs" <?php if($allergy_type == "eggs") echo "selected"; ?>>Oeufs</option>
    <option value="peanut" <?php if($allergy_type == "peanut") echo "selected"; ?>>Arachide</option>
    <option value="nuts" <?php if($allergy_type == "nuts") echo "selected"; ?>>Fruit à coque</option>
    <option value="seafood" <?php if($allergy_type == "seafood") echo "selected"; ?>>Fruit de la mer</option>
    <option value="mollusc" <?php if($allergy_type == "mollusc") echo "selected"; ?>>Mollusques</option>
    <option value="fish" <?php if($allergy_type == "fish") echo "selected"; ?>>Poissons</option>
    <option value="celery" <?php if($allergy_type == "celery") echo "selected"; ?>>Céleri</option>
    <option value="soja" <?php if($allergy_type == "soja") echo "selected"; ?>>Soja</option>
    <option value="sesame" <?php if($allergy_type == "sesame") echo "selected"; ?>>Sésame</option>
    <option value="lupin" <?php if($allergy_type == "lupin") echo "selected"; ?>>Lupin</option>
    <option value="sulfite" <?php if($allergy_type == "sulfite") echo "selected"; ?>>Sulfites</option>
    <option value="other-allergy">Autres</option>
  </select>
  <input type="text" id="other-allergy" name="other-allergy" style="display:none">
</form>

<script>
let select2 = document.getElementById("allergy");
let form = document.getElementById("allergy-form");
let allergyType = document.getElementById("allergy-type");
let allergyOther = document.getElementById("other-allergy");

// Auto complete form if user is logged in

<?php if(isset($_SESSION['user_id'])){ ?>
  if (<?php echo $allergy; ?> == 1) {
    select2.value = "yes";
    form.style.display = "block";
  } else {
    select2.value = "no";
    form.style.display = "none";
  }
<?php } ?>

// Form to indicate allergy for non-logged in users

select2.addEventListener("change", function(){
  if(select2.value === "yes"){
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
});

// Second form to indicate allergy type

allergyType.addEventListener("change", function(){
  if(allergyType.value === "other-allergy"){
    allergyOther.style.display = "block";
  } else {
    allergyOther.style.display = "none";
  }
});

</script>


<!-- Form to indicate the date -->
<div id="available_slots"></div>

<button>Réserver</button>


<!-- FOR ADMIN -->
<div>
  <h2>POUR ADMIN ONLY - NEED TO MOVE TO ADMIN PAGE</h2>
  <form action="http://localhost/STUDI/ECF/SiteWeb/includes/booking.inc.php" method="post">
    <label for="table_count">Nombre de tables disponibles:</label>
    <input type="number" id="table_count" name="table_count" min="0" style="width:50px">
    <input type="submit" value="Envoyer">
  </form>
</div>