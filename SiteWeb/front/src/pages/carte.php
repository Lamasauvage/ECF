
<form action="../../../includes/csv.inc.php" method="post" enctype="multipart/form-data">
    <input type="file" name="plats_upload">
    <input type="submit" value="Upload">
</form>



<table>
  <tr>
    <th>col1</th>
    <th>col2</th>
    <th>col3</th>
    <th>col4</th>
  </tr>
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
