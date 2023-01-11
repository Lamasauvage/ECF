<!--
 CREATE TABLE plats (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  image VARCHAR(255) NOT NULL
 -->

<?php

require_once 'dbh.inc.php';

if(isset($_FILES['plats_upload'])){
    $file = $_FILES['plats_upload'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed = array('csv');
    if(in_array($file_ext, $allowed)){
        move_uploaded_file($file_tmp, '../excel/plats_upload.csv');
    }
}

$file = fopen('../../../excel/plats_upload.csv', "r");
$header = fgetcsv($file);
$categorie = ["entrée", "plat", "dessert"];
while (($data = fgetcsv($file)) !== FALSE) {
   if (in_array(strtolower($data[3]), $categorie)) {
        $query = "INSERT INTO dishes (titre, description, prix, categories) values('$data[0]','$data[1]','$data[2]','$data[3]')";
        $result = mysqli_query($conn, $query);
   }
}

fclose($file);





