<?php

include_once '../../../includes/dbh.inc.php';

  $new_value = $_POST['table_count'] ?? '';
  var_dump($new_value);

  if (!empty($new_value) && is_numeric($new_value)) {
    $select_query = "SELECT * FROM tables";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0) {
      $query = "INSERT INTO tables (available) VALUES ('$new_value')";
    } else {
      $query = "UPDATE tables SET available='$new_value'";
    }

    if (mysqli_query($conn, $query) && mysqli_affected_rows($conn) > 0) {
      $_SESSION['message'] = "Mise à jour du nomnbre de tables réussie";
    } else {
      $_SESSION['message'] = "La mise à jour du nombre de tables a échoué : " . mysqli_error($conn);
    }
  }


header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/admin.php?message=success");

$conn->close();

?>

