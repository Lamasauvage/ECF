<h2>Nos horaires d'ouverture</h2>
    <form action="http://localhost/STUDI/ECF/SiteWeb/includes/updateHours.inc.php" method="post">

        <!-- LUNDI -->
        <div class="day-hours">
        <label for="mondayOpenMorning">Lundi :</label>
        <input type="time" id="mondayOpenMorning" name="mondayOpenMorning">
        <input type="time" id="mondayCloseMorning" name="mondayCloseMorning">
        </div>
        <div class="day-hours">
        <input type="time" id="mondayOpenEvening" name="mondayOpenEvening">
        <input type="time" id="mondayCloseEvening" name="mondayCloseEvening">
        </div>
        <select id="mondayStatus" name="mondayStatus">
        <option value="1">Ouvert</option>
        <option value="0">Fermé</option>
        </select>

        <!-- MARDI -->
        <div class="day-hours">
        <label for="tuesdayOpenMorning">Mardi :</label>
        <input type="time" id="tuesdayOpenMorning" name="tuesdayOpenMorning">
        <input type="time" id="tuesdayCloseMorning" name="tuesdayCloseMorning">
        </div>
        <div class="day-hours">
        <input type="time" id="tuesdayOpenEvening" name="tuesdayOpenEvening">
        <input type="time" id="tuesdayCloseEvening" name="tuesdayCloseEvening">
        </div>
        <select id="tuesdayStatus" name="tuesdayStatus">
        <option value="1">Ouvert</option>
        <option value="0">Fermé</option>
        </select>

        <!-- MERCREDI -->
        <div class="day-hours">
        <label for="wednesdayOpenMorning">Mercredi :</label>
        <input type="time" id="wednesdayOpenMorning" name="wednesdayOpenMorning">
        <input type="time" id="wednesdayCloseMorning" name="wednesdayCloseMorning">
        </div>
        <div class="day-hours">
        <input type="time" id="wednesdayOpenEvening" name="wednesdayOpenEvening">
        <input type="time" id="wednesdayCloseEvening" name="wednesdayCloseEvening">
        </div>
        <select id="wednesdayStatus" name="wednesdayStatus">
        <option value="1">Ouvert</option>
        <option value="0">Fermé</option>
        </select>

        <!-- JEUDI -->
        <div class="day-hours">
        <label for="thursdayOpenMorning">Jeudi :</label>
        <input type="time" id="thursdayOpenMorning" name="thursdayOpenMorning">
        <input type="time" id="thursdayCloseMorning" name="thursdayCloseMorning">
        </div>
        <div class="day-hours">
        <input type="time" id="thursdayOpenEvening" name="thursdayOpenEvening">
        <input type="time" id="thursdayCloseEvening" name="thursdayCloseEvening">
        </div>
        <select id="thursdayStatus" name="thursdayStatus">
        <option value="1">Ouvert</option>
        <option value="0">Fermé</option>
        </select>

        <!-- VENDREDI -->
        <div class="day-hours">
        <label for="fridayOpenMorning">Vendredi :</label>
        <input type="time" id="fridayOpenMorning" name="fridayOpenMorning">
        <input type="time" id="fridayCloseMorning" name="fridayCloseMorning">
        </div>
        <div class="day-hours">
        <input type="time" id="fridayOpenEvening" name="fridayOpenEvening">
        <input type="time" id="fridayCloseEvening" name="fridayCloseEvening">
        </div>
        <select id="fridayStatus" name="fridayStatus">
        <option value="1">Ouvert</option>
        <option value="0">Fermé</option>
        </select>

        <!-- SAMEDI -->
        <div class="day-hours">
        <label for="saturdayOpenMorning">Samedi :</label>
        <input type="time" id="saturdayOpenMorning" name="saturdayOpenMorning">
        <input type="time" id="saturdayCloseMorning" name="saturdayCloseMorning">
        </div>
        <div class="day-hours">
        <input type="time" id="saturdayOpenEvening" name="saturdayOpenEvening">
        <input type="time" id="saturdayCloseEvening" name="saturdayCloseEvening">
        </div>
        <select id="saturdayStatus" name="saturdayStatus">
        <option value="1">Ouvert</option>
        <option value="0">Fermé</option>
        </select>

        <!-- DIMANCHE -->
        <div class="day-hours">
        <label for="sundayOpenMorning">Dimanche :</label>
        <input type="time" id="sundayOpenMorning" name="sundayOpenMorning">
        <input type="time" id="sundayCloseMorning" name="sundayCloseMorning">
        </div>
        <div class="day-hours">
        <input type="time" id="sundayOpenEvening" name="sundayOpenEvening">
        <input type="time" id="sundayCloseEvening" name="sundayCloseEvening">
        </div>
        <select id="sundayStatus" name="sundayStatus">
        <option value="1">Ouvert</option>
        <option value="0">Fermé</option>
        </select>

        <input type="submit" value="UpdateHours">
    </form>
