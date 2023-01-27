<?php
  if(isset($_SESSION['email'])) {
    $is_admin = $_SESSION['email'] == 'admin@localhost.com';
  }
    ?>
<?php
    if(isset($_SESSION['email']) && $_SESSION['email'] == $is_admin) {

    echo '<h2>Formulaire mise à jour des horaires du restaurant</h2>
        <form action="http://localhost/STUDI/ECF/SiteWeb/includes/updateHours.inc.php" method="post">

            <!-- LUNDI -->
            <div class="day-hours">
            <label for="lundiOpenMorning">Lundi :</label>
            <input type="time" id="lundiOpenMorning" name="lundiOpenMorning">
            <input type="time" id="lundiCloseMorning" name="lundiCloseMorning">
            </div>
            <div class="day-hours">
            <input type="time" id="lundiOpenEvening" name="lundiOpenEvening">
            <input type="time" id="lundiCloseEvening" name="lundiCloseEvening">
            </div>
            <select id="lundiStatus" name="lundiStatus">
            <option value="1">Ouvert</option>
            <option value="0">Fermé</option>
            </select>

            <!-- MARDI -->
            <div class="day-hours">
            <label for="mardiOpenMorning">Mardi :</label>
            <input type="time" id="mardiOpenMorning" name="mardiOpenMorning">
            <input type="time" id="mardiCloseMorning" name="mardiCloseMorning">
            </div>
            <div class="day-hours">
            <input type="time" id="mardiOpenEvening" name="mardiOpenEvening">
            <input type="time" id="mardiCloseEvening" name="mardiCloseEvening">
            </div>
            <select id="mardiStatus" name="mardiStatus">
            <option value="1">Ouvert</option>
            <option value="0">Fermé</option>
            </select>

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
            </form>';
    }
?>

<h2>Nos horaires d'ouverture</h2>

<?php
$days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');

foreach ($days as $day) {
  $query = "SELECT open_morning, close_morning, open_evening, close_evening, status FROM restauranthours WHERE day='$day'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $openMorning = $row['open_morning'];
    $closeMorning = $row['close_morning'];
    $openEvening = $row['open_evening'];
    $closeEvening = $row['close_evening'];
    $status = $row['status'];
    if ($status == 0) {
      echo "<p>$day : Fermé</p>";
    } else {
      echo "<p>$day : " . date("H:i", strtotime($openMorning)) . " - " . date("H:i", strtotime($closeMorning)) . "</p>";
      echo "<p>" . date("H:i", strtotime($openEvening)) . " - " . date("H:i", strtotime($closeEvening)) . "</p>";
    }
  }
    mysqli_close($conn); ?>