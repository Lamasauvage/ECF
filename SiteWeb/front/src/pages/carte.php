
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
  while($row = mysqli_fetch_array($result)) {
  ?>
  <tr>
    <td><?php echo $row['col1']; ?></td>
    <td><?php echo $row['col2']; ?></td>
    <td><?php echo $row['col3']; ?></td>
    <td><?php echo $row['col4']; ?></td>
  </tr>
  <?php
  }
  ?>
</table>
