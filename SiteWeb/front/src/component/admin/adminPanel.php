<h1>Admin Panel</h1>

<h2>Gérer la carte du restaurant</h2>
<form action="../../../includes/csv.inc.php" method="post" enctype="multipart/form-data">
<input type="file" name="plats_upload">
<input type="submit" value="Upload">
</form>

<h2>Gérer les réservations</h2>

<h2>Gérer les horaires</h2>
  <h3>Formulaire mise à jour des horaires du restaurant</h3>
    <form action="http://localhost/STUDI/ECF/SiteWeb/includes/updateHours.inc.php" method="post">

      <!-- LUNDI -->
      <div class="day-hours-container">
        <div class="day-hours-row">
          <div class="weekday-label-col">
            <label for="lundiOpenMorning">Lundi :</label>
          </div>
          <div class="morning-hours-col">
            <input type="time" id="lundiOpenMorning" name="lundiOpenMorning">
            <input type="time" id="lundiCloseMorning" name="lundiCloseMorning">
          </div>
          <div class="evening-hours-col">
            <input type="time" id="lundiOpenEvening" name="lundiOpenEvening">
            <input type="time" id="lundiCloseEvening" name="lundiCloseEvening">
          </div>
          <div class="status-col">
            <select id="lundiStatus" name="lundiStatus">
              <option value="1">Ouvert</option>
              <option value="0">Fermé</option>
            </select>
          </div>
        </div>
      </div>

      <!-- MARDI -->
      <div class="day-hours-container">
        <div class="day-hours-row">
          <div class="weekday-label-col">
            <label for="mardiOpenMorning">Mardi :</label>
          </div>
          <div class="morning-hours-col">
            <input type="time" id="mardiOpenMorning" name="mardiOpenMorning">
            <input type="time" id="mardiCloseMorning" name="mardiCloseMorning">
          </div>
          <div class="evening-hours-col">
            <input type="time" id="mardiOpenEvening" name="mardiOpenEvening">
            <input type="time" id="mardiCloseEvening" name="mardiCloseEvening">
          </div>
          <div class="status-col">
            <select id="mardiStatus" name="mardiStatus">
              <option value="1">Ouvert</option>
              <option value="0">Fermé</option>
            </select>
          </div>
        </div>
      </div>

            <!-- MERCREDI -->
            <div class="day-hours">
            <label for="mercrediOpenMorning">Mercredi :</label>
            <input type="time" id="mercrediOpenMorning" name="mercrediOpenMorning">
            <input type="time" id="mercrediCloseMorning" name="mercrediCloseMorning">
            </div>
            <div class="day-hours">
            <input type="time" id="mercrediOpenEvening" name="mercrediOpenEvening">
            <input type="time" id="mercrediCloseEvening" name="mercrediCloseEvening">
            </div>
            <select id="mercrediStatus" name="mercrediStatus">
            <option value="1">Ouvert</option>
            <option value="0">Fermé</option>
            </select>

            <!-- JEUDI -->
            <div class="day-hours">
            <label for="jeudiOpenMorning">Jeudi :</label>
            <input type="time" id="jeudiOpenMorning" name="jeudiOpenMorning">
            <input type="time" id="jeudiCloseMorning" name="jeudiCloseMorning">
            </div>
            <div class="day-hours">
            <input type="time" id="jeudiOpenEvening" name="jeudiOpenEvening">
            <input type="time" id="jeudiCloseEvening" name="jeudiCloseEvening">
            </div>
            <select id="jeudiStatus" name="jeudiStatus">
            <option value="1">Ouvert</option>
            <option value="0">Fermé</option>
            </select>

            <!-- VENDREDI -->
            <div class="day-hours">
            <label for="vendrediOpenMorning">Vendredi :</label>
            <input type="time" id="vendrediOpenMorning" name="vendrediOpenMorning">
            <input type="time" id="vendrediCloseMorning" name="vendrediCloseMorning">
            </div>
            <div class="day-hours">
            <input type="time" id="vendrediOpenEvening" name="vendrediOpenEvening">
            <input type="time" id="vendrediCloseEvening" name="vendrediCloseEvening">
            </div>
            <select id="vendrediStatus" name="vendrediStatus">
            <option value="1">Ouvert</option>
            <option value="0">Fermé</option>
            </select>

            <!-- SAMEDI -->
            <div class="day-hours">
            <label for="samediOpenMorning">Samedi :</label>
            <input type="time" id="samediOpenMorning" name="samediOpenMorning">
            <input type="time" id="samediCloseMorning" name="samediCloseMorning">
            </div>
            <div class="day-hours">
            <input type="time" id="samediOpenEvening" name="samediOpenEvening">
            <input type="time" id="samediCloseEvening" name="samediCloseEvening">
            </div>
            <select id="samediStatus" name="samediStatus">
            <option value="1">Ouvert</option>
            <option value="0">Fermé</option>
            </select>

            <!-- DIMANCHE -->
            <div class="day-hours">
            <label for="dimancheOpenMorning">Dimanche :</label>
            <input type="time" id="dimancheOpenMorning" name="dimancheOpenMorning">
            <input type="time" id="dimancheCloseMorning" name="dimancheCloseMorning">
            </div>
            <div class="day-hours">
            <input type="time" id="dimancheOpenEvening" name="dimancheOpenEvening">
            <input type="time" id="dimancheCloseEvening" name="dimancheCloseEvening">
            </div>
            <select id="dimancheStatus" name="dimancheStatus">
            <option value="1">Ouvert</option>
            <option value="0">Fermé</option>
            </select>
            <input type="submit" value="UpdateHours">
            </form>

<style>



</style>