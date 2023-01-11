<?php

if (isset($_POST["submit"])) {

  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdRepeat"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  // Errors Messages

  // Empty Input
  if (emptyInputSignup($email, $pwd, $pwdRepeat) !== false) {
    header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/signup.php?error=emptyinput");
    exit();
  }

  // Invalid Email
  if (invalidEmail($email) !== false) {
    header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/signup.php?error=invalidemail");
    exit();
  }

  // Password does not match
  if (pwdMatch($pwd, $pwdRepeat) !== false) {
    header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/signup.php?error=passwordsdontmatch");
    exit();
  }

  // Email already exists
  if (userEmailExists($conn, $email) !== false) {
    header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/signup.php?error=emailalreadyexists");
    exit();
  }

  // If everything is good, user is create
  createUser ($conn, $email, $pwd);
}

else {
  header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/signup.php");
  exit();
}