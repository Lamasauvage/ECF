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

$file = fopen('../excel/plats_upload.csv', "r");
while (($data = fgetcsv($file)) !== FALSE) {
    $query = "INSERT INTO dishes(col1, col2, col3, col4) values('$data[0]','$data[1]','$data[2]','$data[4]'))";
    mysqli_query($conn, $query);
}
fclose($file);




