<!--
 CREATE TABLE plats (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  image VARCHAR(255) NOT NULL
);
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

$file = fopen('http://localhost/STUDI/ECF/SiteWeb/excel/plats_upload.csv', "r");
$header = fgetcsv($file);
$categories = ["entrée", "plat", "dessert"];
while (($data = fgetcsv($file)) !== FALSE) {
    $currentCategory = strtolower($data[3]);
    if (in_array($currentCategory, $categories)) {
        $titre = mysqli_real_escape_string($conn, $data[0]);
        $description = mysqli_real_escape_string($conn, $data[1]);
        $price = mysqli_real_escape_string($conn, $data[2]);
        $currentCategory = mysqli_real_escape_string($conn, $currentCategory);
        $sql = "INSERT INTO dishes (title, description, price, categorie) VALUES ('$titre', '$description', '$price', '$currentCategory')";
        $result = mysqli_query($conn, $sql);
    }
}

if ($result) {
    echo "Les données ont été importées avec succès.";
} else {
    echo "Il y a eu une erreur lors de l'import des données.";
}

fclose($file);





