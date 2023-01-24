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



<script>
$(document).ready(function() {
    $('#datePicker').datepicker({
        onSelect: function (dateText) {
            if (dateText) {
                console.log("A date is selected: " + dateText);
                $.ajax({
                    type: 'GET',
                    url: 'http://localhost/STUDI/ECF/SiteWeb/includes/calendar.inc.php',
                    data: {date: dateText},
                    dataType: 'json',
                    success: function (data) {
                        console.log("Ajax call success: " + data);
                        var select = $("#booking_slots");
                        select.empty();
                        var available_slots = $('#available_slots');
                        available_slots.empty();
                        for (var i = 0; i < data.length; i++) {
                            select.append("<option value='" + data[i] + "'>" + data[i] + "</option>");
                            available_slots.append("<div><button class='slot-button'>" + data[i] + "</button></div>");
                        }
                        $(document).on('click', '.slot-button', function () {
                            var hour = $(this).text();
                            //Ajax call to insert the hour and date in the database
                            $.ajax({
                                type: 'POST',
                                url: 'http://localhost/STUDI/ECF/SiteWeb/includes/insert_booking.php',
                                data: {date: dateText, hour: hour},
                                success: function (response) {
                                    console.log("Booking added to the database: " + response);
                                }
                            });
                        });
                    },
                    error: function (err) {
                        console.log("Ajax call failed: " + err);
                    }
                });
            }
        }
    });
});

</script>


