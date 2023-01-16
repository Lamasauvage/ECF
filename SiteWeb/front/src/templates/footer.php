  </body>
  <footer>
    <!-- FORMULAIRE POUR L'ADMIN ONLY -->
    <?php include_once '../component/adminUpdateHours.php'; ?>

    <!-- Horaire d'ouverture visible par tout le monde -->
    <?php
    include_once '../../../includes/dbh.inc.php';

    $query = "SELECT * FROM restauranthours";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $mondayOpen = $row['mondayOpen'];
        $mondayClose = $row['mondayClose'];
    }
?>

<form>
    <label for="mondayOpen">Lundi :</label>
    <input type="time" id="mondayOpen" name="mondayOpen" value="<?php echo $mondayOpen; ?>">
    <input type="time" id="mondayClose" name="mondayClose" value="<?php echo $mondayClose; ?>">
</form>

  </footer>
</html>