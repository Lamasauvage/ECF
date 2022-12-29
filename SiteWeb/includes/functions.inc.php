<?php

// Function Empty Input Signup
function emptyInputSignup($email, $pwd, $pwdRepeat) {
  $result;
  if (empty($email) || (empty($pwd) || (empty($pwdRepeat)))) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

// Function Invalid Email
function invalidEmail($email) {
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

// Function Password Match
function pwdMatch($pwd, $pwdRepeat) {
  $result;
  if ($pwd !== $pwdRepeat) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

// Function Email Already Exists (check the usersEmail in the DB)
function emailExists($conn, $email) {
 $sql = "SELECT * FROM users WHERE usersEmail = ?;";
 //$stmt = mysqli_stmt_init($conn); //
 if (!mysqli_stmt_prepare($stmt, $sql)) {
  # code...
 }
}