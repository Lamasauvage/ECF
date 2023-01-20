<!-- SQL Table for all the tables in the restaurant

CREATE TABLE tables (
  available INT NOT NULL,
);

! SQL Table for booking a table !

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
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>



<!-- French localization -->
<script>
jQuery(function($){
    $.datepicker.regional['fr'] = {
        closeText: 'Fermer',
        prevText: '&#x3c;Préc',
        nextText: 'Suiv&#x3e;',
        currentText: 'Aujourd\'hui',
        monthNames: ['Janvier','Fevrier','Mars','Avril','Mai','Juin',
        'Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
        monthNamesShort: ['Jan','Fev','Mar','Avr','Mai','Jun',
        'Jul','Aou','Sep','Oct','Nov','Dec'],
        dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
        dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
        dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: '',
        minDate: 0,
        maxDate: '+12M +0D',
        numberOfMonths: 1,
        showButtonPanel: true
        };
    $.datepicker.setDefaults($.datepicker.regional['fr']);
});
</script>

<!-- CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<!-- Calendar -->


<div id="datePicker"></div>
<select id="booking_slots"></select>

<script>
$(document).ready(function() {
    $('#datePicker').datepicker({
      
        onSelect: function(dateText) {
            $.ajax({
                type: 'GET',
                url: 'http://localhost/STUDI/ECF/SiteWeb/front/src/component/bookingTable.php',
                data: { date: dateText },
                dataType: 'json',
                success: function(data) {
                    var select = $("#booking_slots");
                    select.empty();
                    for (var i = 0; i < data.length; i++) {
                        select.append("<option value='" + data[i] + "'>" + data[i] + "</option>");
                    }
                },
            });
        }
    });
});
</script>


<?php

include_once '../../../includes/dbh.inc.php';

$date = date("Y-m-d", strtotime(str_replace('/', '-', $_GET['date'])));


$query = "SELECT open_morning, close_evening FROM restauranthours WHERE day = DAYNAME('$date')";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$open_time = $row['open_morning'];
$close_time = $row['close_evening'];

$query = "SELECT available FROM tables";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$available_tables = $row['available'];

$available_slots = array();

$open_time = strtotime($open_time);
$close_time = strtotime($close_time);
for ($time = $open_time; $time <= $close_time - 1; $time = strtotime("+15 minutes", $time)) {
    $slot = date("H:i:s", $time);
    if ($available_tables > 0) {
        $available_slots[] = $slot;
    } else {
        $available_slots[] = $slot . " (Booked)";
    }
}

header('Content-Type: application/json');
echo json_encode($available_slots);
mysqli_close($conn);


?>
</form>



<script>
  $("#datePicker").datepicker();
</script>

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
    <option value="yes">Oui</option>
    <option value="no">Non</option>
  </select>
</form>

<form id="allergy-form" style="display:none;">
  <label for="allergy-type">Préciser le type d'allergie :</label>
  <select name="allergy-type" id="allergy-type">
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
</form>

<script>
let select2 = document.getElementById("allergy");
let form = document.getElementById("allergy-form");
let allergyType = document.getElementById("allergy-type");
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
    allergyOther.style.display = "block";
  } else {
    allergyOther.style.display = "none";
  }
});

</script>

<button>Réserver</button>



<!-- FOR ADMIN -->
<div>
  <h2>POUR ADMIN ONLY</h2>
  <form action="http://localhost/STUDI/ECF/SiteWeb/includes/booking.inc.php" method="post">
    <label for="table_count">Nombre de tables disponibles:</label>
    <input type="number" id="table_count" name="table_count" min="0" style="width:50px">
    <input type="submit" value="Envoyer">
  </form>
</div>
