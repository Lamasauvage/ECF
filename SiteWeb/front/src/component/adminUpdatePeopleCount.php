<?php

include_once '../../../includes/dbh.inc.php';

  $new_value = $_POST['people_count'] ?? '';
  var_dump($new_value);

  if (!empty($new_value) && is_numeric($new_value)) {
    $select_query = "SELECT * FROM restaurant_capacity";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0) {
      $query = "INSERT INTO restaurant_capacity (capacity) VALUES ('$new_value')";
    } else {
      $query = "UPDATE restaurant_capacity SET capacity='$new_value'";
    }

    if (mysqli_query($conn, $query) && mysqli_affected_rows($conn) > 0) {
      $_SESSION['message'] = "Mise à jour du nomnbre de personnes autorisé maximum réussie";
    } else {
      $_SESSION['message'] = "La mise à jour du nombre de personne a échoué : " . mysqli_error($conn);
    }
  }


header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/admin.php?message=success");

$conn->close();

?>

