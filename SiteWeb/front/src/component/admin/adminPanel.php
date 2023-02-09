<h1 class="admin-panel-title">Admin Panel</h1>

<!-- CARTE -->
<div class="admin-panel">
  <div class="admin-panel-section">
    <h2 class="admin-title-carte">Gérer la carte du restaurant</h2>
    <form action="../../../includes/csv.inc.php" method="post" enctype="multipart/form-data" class="admin-panel-form">
      <input type="file" name="plats_upload" class="admin-panel-input-file">
      <input type="submit" value="ENVOYER" class="admin-panel-submit-button">
    </form>
  </div>

<!-- TABLES -->
  <div class="admin-panel-section">
    <h2 class="admin-title-table">Gérer le nombre de tables</h2>
    <?php
      include_once '../../../includes/dbh.inc.php';
      $select_query = "SELECT available FROM tables";
      $result = mysqli_query($conn, $select_query);
      $row = mysqli_fetch_assoc($result);
      $table_count = $row['available'] ?? 0;
    ?>

      <p class="text-table">Nombre de tables disponibles: <span style="font-size:30px; color:red;"><?php echo $table_count; ?></span></p>

      <form action="http://localhost/STUDI/ECF/SiteWeb/front/src/component/adminUpdateTables.php" method="post" class="form-table">
        <label for="table_count" class="table-count">Mise à jour du nombre de tables disponibles:</label>
        <input type="number" id="table_count" name="table_count" min="0" style="width:50px">
        <input type="submit" value="ENVOYER">
      </form>

      <?php
      if (isset($_GET['message']) && $_GET['message'] == 'success') {
      echo "<p class='table-count'>Mise à jour du nombre de tables réussie</p>";
      unset($_GET['message']);
      }
    ?>
  </div>
</div>


<!-- BOOKINGS -->

<h2 class="booking-title">Gérer les réservations</h2>

<?php
  include_once '../../../includes/dbh.inc.php';

  $allergyBool = array(
    "yes" => "Oui",
    "no" => "Non"
  );

  $allergyMap = array(
    "gluten" => "Gluten",
    "milk" => "Lait",
    "eggs" => "Oeufs",
    "peanut" => "Arachide",
    "nuts" => "Fruit à coque",
    "seafood" => "Fruit de la mer",
    "mollusc" => "Mollusque",
    "fish" => "Poisson",
    "celery" => "Céleri",
    "soja" => "Soja",
    "sesame" => "Sésame",
    "lupin" => "Lupin",
    "sulfite" => "Sulfites",
    "other-allergy" => "Autres"
  );

  $sql = "SELECT * FROM booking";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      echo "<table class='booking-table'>";
      echo "<tr>";
      echo "<th class='booking-table-header'>Date</th>";
      echo "<th class='booking-table-header'>Heure</th>";
      echo "<th class='booking-table-header'>Nom</th>";
      echo "<th class='booking-table-header'>Email</th>";
      echo "<th class='booking-table-header'>Téléphone</th>";
      echo "<th class='booking-table-header'>Nombre de couverts</th>";
      echo "<th class='booking-table-header'>Allergie</th>";
      echo "<th class='booking-table-header'>Type d'allergie</th>";
      echo "<th class='booking-table-header'>Supprimer</th>";
      echo "<th class='booking-table-header'>Modifier</th>";
      echo "</tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr class='booking-table-row'>";
        echo "<td class='booking-table-data'>" . (new DateTime($row["date"]))->format("d-m-Y") . "</td>";
        echo "<td class='booking-table-data'>" . $row["time"] . "</td>";
        echo "<td class='booking-table-data'>" . $row["name"] . "</td>";
        echo "<td class='booking-table-data'>" . $row["email"] . "</td>";
        echo "<td class='booking-table-data'>" . $row["phone"] . "</td>";
        echo "<td class='booking-table-data'>" . $row["guests"] . "</td>";
        echo "<td class='booking-table-data'>" . $allergyBool[$row["allergy"]] . "</td>";
        echo "<td class='booking-table-data'>" . (array_key_exists($row["allergy_type"], $allergyMap) ? $allergyMap[$row["allergy_type"]] : "") . "</td>";
        echo "<td><button class='delete-btn' onclick='deleteBooking(".$row['id'].")'>Supprimer</button></td>";
        echo "<td><button class='edit-btn' data-id='".$row['id']."'>Modifier</button></td>";
        echo "</tr>";
      }
      echo "</table>";
  } else {
      echo "<tr class='booking-table-row'><td class='booking-table-empty'>Aucune réservation enregistrée</td></tr>";
  }
?>

<!-- DELETE BOOKING -->
<?php
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "DELETE FROM booking WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  if ($result) {
      // Increase the number of available tables by 1
      $sql_update = "UPDATE tables SET available = available + 1";
      $result_update = mysqli_query($conn, $sql_update);
      if ($result_update) {
          echo 'success';
      } else {
          echo "Erreur lors de la mise à jour de la table: " . mysqli_error($conn);
      }
  } else {
      echo "Erreur de suppression: " . mysqli_error($conn);
  }
  exit;
}
?>

<script>
function deleteBooking(id) {
  if (confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')) {
    fetch(`admin.php?id=${id}`, {
      method: 'DELETE',
    })
      .then((response) => {
        if (response.ok) {
          alert('Réservation supprimée avec succès');
          location.reload();
        } else {
          alert('Une erreur est survenue lors de la suppression de la réservation');
        }
      })
      .catch((error) => {
        console.error('Erreur:', error);
        alert('Une erreur est survenue lors de la suppression de la réservation');
      });
  }
}
</script>

<!-- HOURS -->

<h2 class="title-hours">Gérer les horaires</h2>
  <form action="http://localhost/STUDI/ECF/SiteWeb/includes/updateHours.inc.php" method="post" class="form-hours-update">

      <!-- LUNDI -->
      <div class="day-hours-container">
        <div class="day-hours-row">
          <div class="weekday-label-col">
            <label for="lundiOpenMorning">Lundi :</label>
          </div>
          <div class="morning-hours-col">
            <p class="morning-evening">Matin</p>
            <input type="time" id="lundiOpenMorning" name="lundiOpenMorning">
            <input type="time" id="lundiCloseMorning" name="lundiCloseMorning">
          </div>
          <div class="evening-hours-col">
            <p class="morning-evening">Soir</p>
            <input type="time" id="lundiOpenEvening" name="lundiOpenEvening">
            <input type="time" id="lundiCloseEvening" name="lundiCloseEvening">
          </div>
          <div class="status-col">
            <p class="status-day">Statut</p>
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
            <p class="morning-evening">Matin</p>
            <input type="time" id="mardiOpenMorning" name="mardiOpenMorning">
            <input type="time" id="mardiCloseMorning" name="mardiCloseMorning">
          </div>
          <div class="evening-hours-col">
            <p class="morning-evening">Soir</p>
            <input type="time" id="mardiOpenEvening" name="mardiOpenEvening">
            <input type="time" id="mardiCloseEvening" name="mardiCloseEvening">
          </div>
          <div class="status-col">
            <p class="status-day">Statut</p>
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
            <p class="morning-evening">Matin</p>
            <input type="time" id="mercrediOpenMorning" name="mercrediOpenMorning">
            <input type="time" id="mercrediCloseMorning" name="mercrediCloseMorning">
          </div>
          <div class="evening-hours-col">
            <p class="morning-evening">Soir</p>
            <input type="time" id="mercrediOpenEvening" name="mercrediOpenEvening">
            <input type="time" id="mercrediCloseEvening" name="mercrediCloseEvening">
          </div>
          <div class="status-col">
            <p class="status-day">Statut</p>
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
            <p class="morning-evening">Matin</p>
            <input type="time" id="jeudiOpenMorning" name="jeudiOpenMorning">
            <input type="time" id="jeudiCloseMorning" name="jeudiCloseMorning">
          </div>
          <div class="evening-hours-col">
            <p class="morning-evening">Soir</p>
            <input type="time" id="jeudiOpenEvening" name="jeudiOpenEvening">
            <input type="time" id="jeudiCloseEvening" name="jeudiCloseEvening">
          </div>
          <div class="status-col">
            <p class="status-day">Statut</p>
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
            <p class="morning-evening">Matin</p>
            <input type="time" id="vendrediOpenMorning" name="vendrediOpenMorning">
            <input type="time" id="vendrediCloseMorning" name="vendrediCloseMorning">
          </div>
          <div class="evening-hours-col">
            <p class="morning-evening">Soir</p>
            <input type="time" id="vendrediOpenEvening" name="vendrediOpenEvening">
            <input type="time" id="vendrediCloseEvening" name="vendrediCloseEvening">
          </div>
          <div class="status-col">
            <p class="status-day">Statut</p>
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
            <p class="morning-evening">Matin</p>
            <input type="time" id="samediOpenMorning" name="samediOpenMorning">
            <input type="time" id="samediCloseMorning" name="samediCloseMorning">
          </div>
          <div class="evening-hours-col">
            <p class="morning-evening">Soir</p>
            <input type="time" id="samediOpenEvening" name="samediOpenEvening">
            <input type="time" id="samediCloseEvening" name="samediCloseEvening">
          </div>
          <div class="status-col">
            <p class="status-day">Statut</p>
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
            <p class="morning-evening">Matin</p>
            <input type="time" id="dimancheOpenMorning" name="dimancheOpenMorning">
            <input type="time" id="dimancheCloseMorning" name="dimancheCloseMorning">
          </div>
          <div class="evening-hours-col">
            <p class="morning-evening">Soir</p>
            <input type="time" id="dimancheOpenEvening" name="dimancheOpenEvening">
            <input type="time" id="dimancheCloseEvening" name="dimancheCloseEvening">
          </div>
          <div class="status-col">
            <p class="status-day">Statut</p>
            <select id="dimancheStatus" name="dimancheStatus">
              <option value="1">Ouvert</option>
              <option value="0">Fermé</option>
            </select>
          </div>
        </div>
      </div>

  <div class="hours-submit-container">
    <form action="http://localhost/STUDI/ECF/SiteWeb/front/src/component/adminUpdateHours.php" method="post">
    <input type="submit" value="Envoyer" class="input-hours">
    </form>
  </div>
