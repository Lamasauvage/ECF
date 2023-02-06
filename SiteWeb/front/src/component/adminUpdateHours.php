<?php
  if(isset($_SESSION['email'])) {
    $is_admin = $_SESSION['email'] == 'admin@localhost.com';
  }
    ?>



  <div class="container-footer">
    <h2>Nos horaires d'ouverture</h2>
    <table>
      
      <tbody>
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
              echo "<tr><td>$day</td><td>Fermé</td></tr>";
            } else {
              echo "<tr><td>$day</td><td>" . date("H:i", strtotime($openMorning)) . " - " . date("H:i", strtotime($closeMorning)) . "<br>" . date("H:i", strtotime($openEvening)) . " - " . date("H:i", strtotime($closeEvening)) . "</td></tr>";
            }
          }
          mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </div>
