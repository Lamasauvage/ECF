<?php include_once '../templates/header.php'; ?>
<style>
<?php include "../../../css/style.css"; ?>
</style>

<form action="../../../includes/csv.inc.php" method="post" enctype="multipart/form-data">
    <input type="file" name="plats_upload">
    <input type="submit" value="Upload">
</form>



<table>
  <?php
  include_once '../../../includes/csv.inc.php';

  $sql = "SELECT * FROM dishes";
  $result = mysqli_query($conn, $sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      ?>
  <tr>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><?php echo $row['categorie']; ?></td>
  </tr>
  <?php
    }
  }
  ?>
</table>
