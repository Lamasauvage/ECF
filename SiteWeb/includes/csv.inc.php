<?php

include_once 'dbh.inc.php';

if (isset($_FILES['plats_upload'])) {
    $file = $_FILES['plats_upload'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed = array('csv');
    if (in_array($file_ext, $allowed)) {
        move_uploaded_file($file_tmp, '../excel/plats_upload.csv');

        if (!headers_sent()) {
            header("Location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/admin.php");
            exit();
        } else {
            echo "Echec de la redirection";
        }
    }
}

$file = fopen('http://localhost/STUDI/ECF/SiteWeb/excel/plats_upload.csv', "rb");
$header = fgetcsv($file);
$categories = ["entree", "plat", "dessert", "vin"];

$existingData = [];
while (($data = fgetcsv($file, null, ';')) !== FALSE) {
    $currentCategory = strtolower($data[3]);
    if (in_array($currentCategory, $categories)) {
        $title = mysqli_real_escape_string($conn, $data[0]);
        $description = mysqli_real_escape_string($conn, $data[1]);
        $price = mysqli_real_escape_string($conn, $data[2]);
        $currentCategory = mysqli_real_escape_string($conn, $currentCategory);
        $existingData[] = "$title,$description,$price,$currentCategory";
        $checkSql = "SELECT * FROM dishes WHERE title = '$title' AND description = '$description' AND price = '$price' AND categorie = '$currentCategory'";
        $checkResult = mysqli_query($conn, $checkSql);
        if ($checkResult->num_rows == 0) {
            $sql = "INSERT INTO dishes (title, description, price, categorie) VALUES ('$title', '$description', '$price', '$currentCategory')";
            $result = mysqli_query($conn, $sql);
        }
    }
}

$deleteSql = "DELETE FROM dishes WHERE CONCAT(title, ',', description, ',', price, ',', categorie) NOT IN ('" . implode("','", $existingData) . "')";
mysqli_query($conn, $deleteSql);



