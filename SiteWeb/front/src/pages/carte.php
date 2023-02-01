<?php include_once '../templates/header.php'; ?>
<style>
<?php include "../../../css/style.css"; ?>
</style>



<div class="filter">
  <a href="#" class="btn" data-filter="all">Tout</a>
  <a href="#" class="btn" data-filter="entree">Entrée</a>
  <a href="#" class="btn" data-filter="plat">Plat</a>
  <a href="#" class="btn" data-filter="dessert">Dessert</a>
  <a href="#" class="btn" data-filter="vin">Vin</a>

</div>

<table>
  <tr>
    <th>Plat</th>
    <th>Description</th>
    <th>Prix</th>
    <th>Catégorie</th>
  </tr>

  <?php
  include_once '../../../includes/csv.inc.php';
  $sql = "SELECT * FROM dishes ORDER BY CASE WHEN categorie = 'entree' THEN 1 WHEN categorie = 'plat' THEN 2 WHEN categorie = 'dessert' THEN 3 WHEN categorie = 'vin' THEN 4 END
  ";
  $result = mysqli_query($conn, $sql);

  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){

    $categories = array(
    'entree' => 'Entrée',
    'plat' => 'Plat',
    'dessert' => 'Dessert',
    'vin' => 'Vin');
  ?>

    <tr class="menu-item <?php echo $row['categorie']; ?>">
      <td class="menu-item-title"><?php echo $row['title']; ?></td>
      <td><?php echo $row['description']; ?></td>
      <td class="menu-item-price"><?php echo $row['price']; ?>€</td>
      <td><?php echo $categories[$row['categorie']]; ?></td>
    </tr>
    
  <?php
  }
}
  ?>
</table>

<script>
  const btns = document.querySelectorAll('.btn');
  btns.forEach(function(btn){
    btn.addEventListener('click', function(e){
      e.preventDefault();
      const filter = this.dataset.filter;
      const items = document.querySelectorAll('.menu-item');
      items.forEach(function(item){
        if(filter === 'all'){
          item.style.display = 'table-row';
        } else {
          if(item.classList.contains(filter)){
            item.style.display = 'table-row';
          } else {
            item.style.display = 'none';
          }
        }
      });
    });
  });
</script>

<!-- Split -->

<div class="split"></div>

<!-- Footer -->

<?php include_once '../templates/footer.php'; ?>
