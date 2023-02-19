<?php

include_once '../../../includes/dbh.inc.php';

    if (isset($_SESSION['user_id'])) {
      $query = "SELECT email, guests, allergy, allergy_type FROM users WHERE id = '" . $_SESSION['user_id'] . "'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);

      $email = $row['email'];
      $guests = $row['guests'];
      $allergy = $row['allergy'];
      $allergy_type = $row['allergy_type'];

    } else {
      $email = "";
      $guests = 1;
      $allergy = "";
      $allergy_type = "";
    }

?>


<!-- Form to indicate name/email and phone -->

<div class="booking-content">
  <form class="booking-form">
    <h2>Réserver une table</h2>
    <label for="name">Nom:</label>
    <input type="text" id="name" name="name">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email;?>">

    <label for="phone">Téléphone:</label>
    <input type="tel" id="phone" name="phone">


  <!-- Number of covers -->

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
      <option value="custom_value">Autre</option>
    </select>
    <input type="number" id="custom_value" name="custom_value" min="1" style="display:none; width:50px" value="<?php if($guests > 10)   echo $guests; ?>">



  <!-- Manual entry form in case there are +7 persons -->

  <script>
  let select = document.getElementById("guests");
  let input = document.getElementById("custom_value");
  if (<?php echo $guests; ?> > 10){
      input.style.display = "inline-block";
  }
  select.addEventListener("change", function(){
    if(select.value === "custom_value"){
      input.style.display = "inline-block";
    } else {
      input.style.display = "none";
    }
  });
  </script>

<!-- Indicate allergy -->

    <form>
      <label for="allergy">Avez-vous des allergies alimentaires ?</label>
      <select name="allergy" id="allergy">
        <option value=""></option>
        <option value="yes">Oui</option>
        <option value="no">Non</option>
      </select>
    </form>

    <form class="booking-form" id="allergy_form" style="display:none;">
      <label for="allergy_type">Préciser le type d'allergie :</label>
      <select name="allergy_type" id="allergy_type">
        <option value=""></option>
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
        <option value="other_allergy">Autres</option>
      </select>
      <input type="text" id="other_allergy" name="other_allergy" style="display:none">
    </form>

  <script>
  let select2 = document.getElementById("allergy");
  let form = document.getElementById("allergy_form");
  let allergyType = document.getElementById("allergy_type");
  let allergyOther = document.getElementById("other_allergy");

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

// Form to indicate allergy for non-logged-in users

  select2.addEventListener("change", function(){
    if(select2.value === "yes"){
      form.style.display = "block";
    } else {
      form.style.display = "none";
    }
  });

// Second form to indicate allergy type

  allergyType.addEventListener("change", function(){
    if(allergyType.value === "other_allergy"){
      allergyOther.style.display = "block";
    } else {
      allergyOther.style.display = "none";
    }
  });

  </script>


<!-- Form to indicate the date -->

<div class="available-slots" id="available_slots"></div>

<!-- Message if there are no available slots -->


  <!-- Button to book a slot -->

<button class="booking_button">Réserver</button>

  <!-- SPLIT -->

<div class="split"></div>

  </form>
</div>
