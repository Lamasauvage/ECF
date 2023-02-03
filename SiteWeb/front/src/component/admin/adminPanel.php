<h1>Admin Panel</h1>

<!-- CARTE -->

<h2>Gérer la carte du restaurant</h2>
<form action="../../../includes/csv.inc.php" method="post" enctype="multipart/form-data">
<input type="file" name="plats_upload">
<input type="submit" value="Upload">
</form>

<!-- BOOKINGS -->

<h2>Gérer les réservations</h2>



<!-- TABLES --> 

<h2>Gérer le nombre de tables</h2>
<?php
  include_once '../../../includes/dbh.inc.php';
  $select_query = "SELECT available FROM tables";
  $result = mysqli_query($conn, $select_query);
  $row = mysqli_fetch_assoc($result);
  $table_count = $row['available'] ?? 0;
?>
  <p>Nombre de tables disponibles: <?php echo $table_count; ?></p>

  <form action="http://localhost/STUDI/ECF/SiteWeb/front/src/component/adminUpdateTables.php" method="post">
    <label for="table_count">Nombre de tables disponibles:</label>
    <input type="number" id="table_count" name="table_count" min="0" style="width:50px">
    <input type="submit" value="Envoyer">
  </form>

  <?php
  if (isset($_GET['message']) && $_GET['message'] == 'success') {
    echo "<p>Mise à jour du nombre de tables réussie</p>";
  }
?>




<!-- HOURS -->

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
      <div class="day-hours-container">
        <div class="day-hours-row">
          <div class="weekday-label-col">
            <label for="mercrediOpenMorning">Mercredi :</label>
          </div>
          <div class="morning-hours-col">
            <input type="time" id="mercrediOpenMorning" name="mercrediOpenMorning">
            <input type="time" id="mercrediCloseMorning" name="mercrediCloseMorning">
          </div>
          <div class="evening-hours-col">
            <input type="time" id="mercrediOpenEvening" name="mercrediOpenEvening">
            <input type="time" id="mercrediCloseEvening" name="mercrediCloseEvening">
          </div>
          <div class="status-col">
            <select id="mercrediStatus" name="mercrediStatus">
              <option value="1">Ouvert</option>
              <option value="0">Fermé</option>
            </select>
          </div>
        </div>
      </div>

      <!-- JEUDI -->
      <div class="day-hours-container">
        <div class="day-hours-row">
          <div class="weekday-label-col">
            <label for="jeudiOpenMorning">Jeudi :</label>
          </div>
          <div class="morning-hours-col">
            <input type="time" id="jeudiOpenMorning" name="jeudiOpenMorning">
            <input type="time" id="jeudiCloseMorning" name="jeudiCloseMorning">
          </div>
          <div class="evening-hours-col">
            <input type="time" id="jeudiOpenEvening" name="jeudiOpenEvening">
            <input type="time" id="jeudiCloseEvening" name="jeudiCloseEvening">
          </div>
          <div class="status-col">
            <select id="jeudiStatus" name="jeudiStatus">
              <option value="1">Ouvert</option>
              <option value="0">Fermé</option>
            </select>
          </div>
        </div>
      </div>

       <!-- VENDREDI -->
       <div class="day-hours-container">
        <div class="day-hours-row">
          <div class="weekday-label-col">
            <label for="vendrediOpenMorning">Vendredi :</label>
          </div>
          <div class="morning-hours-col">
            <input type="time" id="vendrediOpenMorning" name="vendrediOpenMorning">
            <input type="time" id="vendrediCloseMorning" name="vendrediCloseMorning">
          </div>
          <div class="evening-hours-col">
            <input type="time" id="vendrediOpenEvening" name="vendrediOpenEvening">
            <input type="time" id="vendrediCloseEvening" name="vendrediCloseEvening">
          </div>
          <div class="status-col">
            <select id="vendrediStatus" name="vendrediStatus">
              <option value="1">Ouvert</option>
              <option value="0">Fermé</option>
            </select>
          </div>
        </div>
      </div>

      <!-- SAMEDI -->
      <div class="day-hours-container">
        <div class="day-hours-row">
          <div class="weekday-label-col">
            <label for="samediOpenMorning">Samedi :</label>
          </div>
          <div class="morning-hours-col">
            <input type="time" id="samediOpenMorning" name="samediOpenMorning">
            <input type="time" id="samediCloseMorning" name="samediCloseMorning">
          </div>
          <div class="evening-hours-col">
            <input type="time" id="samediOpenEvening" name="samediOpenEvening">
            <input type="time" id="samediCloseEvening" name="samediCloseEvening">
          </div>
          <div class="status-col">
            <select id="samediStatus" name="samediStatus">
              <option value="1">Ouvert</option>
              <option value="0">Fermé</option>
            </select>
          </div>
        </div>
      </div>
      
      <!-- DIMANCHE -->
      <div class="day-hours-container">
        <div class="day-hours-row">
          <div class="weekday-label-col">
            <label for="dimancheOpenMorning">Dimanche :</label>
          </div>
          <div class="morning-hours-col">
            <input type="time" id="dimancheOpenMorning" name="dimancheOpenMorning">
            <input type="time" id="dimancheCloseMorning" name="dimancheCloseMorning">
          </div>
          <div class="evening-hours-col">
            <input type="time" id="dimancheOpenEvening" name="dimancheOpenEvening">
            <input type="time" id="dimancheCloseEvening" name="dimancheCloseEvening">
          </div>
          <div class="status-col">
            <select id="dimancheStatus" name="dimancheStatus">
              <option value="1">Ouvert</option>
              <option value="0">Fermé</option>
            </select>
          </div>
        </div>
      </div>
    
