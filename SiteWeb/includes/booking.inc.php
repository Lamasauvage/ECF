<!-- SQL Table for booking a table 

CREATE TABLE booking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    time TIME NOT NULL,
    guest INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
  ); 

-->


 <!-- JQUERY FOR DATE PICKER -->

<link rel="stylesheet" href="http://localhost/STUDI/ECF/SiteWeb/js/jquery/jquery-ui.css">
<link rel="stylesheet" href="http://localhost/STUDI/ECF/SiteWeb/js/jquery/jquery-stucture.css">
<link rel="stylesheet" href="http://localhost/STUDI/ECF/SiteWeb/js/jquery/jquery-ui.theme.css">


<!-- Calendar -->

<div id="mydiv"></div>

<!-- Form to indicate the number of covers -->

<form>
  <label for="guest">Nombre de couverts:</label>
  <select name="guest" id="guest">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="custom-value">Autre</option>
  </select>
  <input type="number" id="custom-value" name="custom-value" min="1" style="display:none; width:50px">
</form>


<!-- Manual entry form in case there are +7 persons -->

<script>
var select = document.getElementById("guest");
var input = document.getElementById("custom-value");
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
    <option value="yes">Oui</option>
    <option value="no">Non</option>
</form>

<form>
  <select name="allergy-list" id="allergy-list" style="display:none">
  <label for="allergy-list">Sélectionnez vos allergies:</label>
  <select name="allergy-list" id="allergy-list">
    <option value="Gluten">Gluten</option>
    <option value="Oeufs">Oeufs</option>
    <option value="Lait">Lait</option>
    <option value="Arachide">Arachide</option>
    <option value="Fruits à coque">Fruits à coque</option>
    <option value="Fruits de mer">Fruits de mer</option>
    <option value="Mollusques">Mollusques</option>
    <option value="Poissons">Poissons</option>
    <option value="Moutarde">Moutarde</option>
    <option value="Céleri">Céleri</option>
    <option value="Soja">Soja</option>
    <option value="Sésame">Sésame</option>
    <option value="Lupin">Lupin</option>
    <option value="Sulfites">Sulfites</option>
    <option value="custom-allergy">Autre</option>
  </select>
</form>

<script>
var allergy = document.getElementById("allergy");
var allergyList = document.getElementById("custom-allergy");
allergy.addEventListener("change", function(){
  if(allergy.value === "custom-allergy"){
    input.style.display = "inline-block";
  } else {
    allergyList.style.display = "none";
  }
});
</script>



<script type="text/javascript" src="http://localhost/STUDI/ECF/SiteWeb/js/jquery/jquery.js"></script>
<script type="text/javascript" src="http://localhost/STUDI/ECF/SiteWeb/js/jquery/jquery-ui.js"></script>

<script>
    $("#mydiv").datepicker();
</script>