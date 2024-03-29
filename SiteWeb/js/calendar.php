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
                            available_slots.append("<div><button class='slot-button'>" + data[i] + "</button></div>");}

                        $('.slot-button').on('click', function() {
                                $('.slot-button').removeClass('selected');
                                $(this).addClass('selected');
                                selectedSlot = $(this).text();
                                console.log("Selected slot: " + selectedSlot);
                        });

                        //Ajax call to insert the booking in the database

                        $(document).on('click', '.booking_button', function () {
                            var date = $('#datePicker').datepicker('getDate');
                            var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);
                            var time = $('.slot-button.selected').text();
                            var name = $('#name').val();
                            var email = $('#email').val();
                            var phone = $('#phone').val();
                            var guests = $('#guests').val();
                            var allergy = $('#allergy').val();
                            var allergy_type = $('#allergy_type').val();

                            if (!formattedDate || !time || !name || !email || !phone || !guests || !allergy) {
                                alert("Tous les champs sont requis");
                                return;
                                }
  
                            // Check allergy_type only if allergy is not equal to "no"
                            if (allergy !== "no" && !allergy_type) {
                                alert("Le type d'allergie est requis");
                                return;
                                }

                            $.ajax({
                                type: 'POST',
                                url: 'http://localhost/STUDI/ECF/SiteWeb/includes/booking.inc.php',
                                data: {date: formattedDate, time: time, name: name, email: email, phone: phone, guests: guests, allergy: allergy, allergy_type: allergy_type},
                                success: function (data) {
                                    console.log("Ajax call success: " + (data));
                                    if (data.indexOf("success") != -1) {
                                        alert("Votre réservation pour le " + formattedDate + " à " + time + " a bien été prise en compte");
                                        window.location.href = "http://localhost/STUDI/ECF/SiteWeb/front/src/pages/index.php";
                                    } else {
                                        console.log("Ajax call error: " + data);
                                        alert("Une erreur est survenue");
                                    }
                                },
                            })
                        });
                    }
                });
            }
        }
    });
});

</script>


