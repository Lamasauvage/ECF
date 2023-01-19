<!-- SQL Table for all the tables in the restaurant

CREATE TABLE tables (
  available INT NOT NULL,
);

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
let select = document.getElementById("guest");
let input = document.getElementById("custom-value");
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
    <option value="allergy-yes">Oui</option>
    <option value="allergy-no">Non</option>
  </select>
  <input type="text" id="allergy-yes" name="allergy-yes" style="display:none">
</form>

<script>
let select2 = document.getElementById("allergy");
let input2 = document.getElementById("allgery-yes");
select2.addEventListener("change", function(){
  if(select.value === "allgery-yes"){
    input2.style.display = "inline-block";
  } else {
    input2.style.display = "none";
  }
});
</script>

<button>Réserver</button>



<!-- FOR ADMIN -->

<form action="http://localhost/STUDI/ECF/SiteWeb/includes/booking.inc.php" method="post">
  <label for="table_count">Nombre de tables disponibles:</label>
  <input type="number" id="table_count" name="table_count" min="0">
  <input type="submit" value="Envoyer">
</form>


<script type="text/javascript" src="http://localhost/STUDI/ECF/SiteWeb/js/jquery/jquery.js"></script>
<script type="text/javascript" src="http://localhost/STUDI/ECF/SiteWeb/js/jquery/jquery-ui.js"></script>

<script>
    $("#mydiv").datepicker();
</script>