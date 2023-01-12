<?php

if (isset($_POST["submit"])) {

  $email = $_POST["email"];
  $pwd = $_POST["pwd"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  //Error Messages

  // Empty Input
  if (emptyInputLogin($email, $pwd) !== false) {
    header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/login.php?error=emptyinput");
    exit();
  }

  // METTRE D'AUTRES MSG ERREURS

  loginUser($conn, $email, $pwd);
}
else {
  header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/login.php?");
  exit();
}