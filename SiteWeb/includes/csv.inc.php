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

$file = fopen('http://localhost/STUDI/ECF/SiteWeb/excel/plats_upload.csv', "r");
$header = fgetcsv($file);
$categories = ["entree", "plat", "dessert"];
while (($data = fgetcsv($file)) !== FALSE) {
    var_dump($data);
    if (in_array(strtolower($data[0]), $categories)) {
        $titre = mysqli_real_escape_string($conn, $data[0]);
        $description = mysqli_real_escape_string($conn, $data[1]);
        $prix = mysqli_real_escape_string($conn, $data[2]);
        $categorie = mysqli_real_escape_string($conn, $data[3]);
        $sql = "INSERT INTO dishes (titre, description, prix,categorie) VALUES ('$titre', '$description', '$prix', '$categorie')";
        $result = mysqli_query($conn, $sql);
    }
}

fclose($file);

if ($result) {
    echo "Les données ont été importées avec succès.";
} else {
    echo "Il y a eu une erreur lors de l'import des données.";
}

 




