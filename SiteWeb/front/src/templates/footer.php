  </body>
  <footer>
    <!-- FORMULAIRE POUR L'ADMIN ONLY -->
    <?php include_once '../component/adminUpdateHours.php'; ?>

    <!-- Horaire d'ouverture visible par tout le monde -->
    <?php 
    include_once '../../../includes/dbh.inc.php';

    $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

    foreach ($days as $day) {
      $query = "SELECT open_morning, close_morning, open_evening, close_evening FROM restauranthours WHERE day='$day'";
    
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      $openMorning = $row['open_morning'];
      $closeMorning = $row['close_morning'];
      $openEvening = $row['open_evening'];
      $closeEvening = $row['close_evening'];
    
      echo "<p>$day: de " . date("H:i", strtotime($openMorning)) . " à " . date("H:i", strtotime($closeMorning)) . "</p>";
    }
    mysqli_close($conn); ?>
  </footer>
</html>

