<?php

// SIGNUP PAGE

// Function Empty Input Signup
function emptyInputSignup($email, $pwd, $pwdRepeat) {
  $result = false;
  if (empty($email) || empty($pwd) || empty($pwdRepeat)) {
    $result = true;
  }
  return $result;
}

// Function Invalid Email
function invalidEmail($email) {
  $result = false;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  return $result;
}

// Function Password Match
function pwdMatch($pwd, $pwdRepeat) {
  $result = false;
  if ($pwd !== $pwdRepeat) {
    $result = true;
  }
  return $result;
}

// Function Email Already Exists (check the usersEmail in the DB)
function userEmailExists($conn, $email) {
 $sql = "SELECT * FROM users WHERE Email = ?;";
 $stmt = mysqli_stmt_init($conn);
 if (!mysqli_stmt_prepare($stmt, $sql)) {
  header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/signup.php?error=stmtfailed");
  exit();
 }

 mysqli_stmt_bind_param($stmt, "s", $email);
 mysqli_stmt_execute($stmt);

 $resultData = mysqli_stmt_get_result($stmt);

 if ($row = mysqli_fetch_assoc($resultData)) {
  return $row;
 }
 else {
  $result = false;
  return $result;
 }
 
 mysqli_stmt_close($stmt);
}


// Function Create a new user
function createUser($conn, $email, $pwd) {
  $sql = "INSERT INTO users (email, password) VALUES (?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
   header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/signup.php?error=stmtfailed");
   exit();
  }
 
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);



  mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/signup.php?error=none");
  exit();

 }

 // LOGIN PAGE

 function emptyInputLogin($email, $pwd) {
  $result = false;
  if (empty($email) || empty($pwd)) {
    $result = true;
  }
  return $result;
}

// LOGIN USER

function loginUser($conn, $email, $pwd) {
  $user = userEmailExists($conn, $email);

  if ($user === false) {
    header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/login.php?error=wronglogin");
    exit();
  }

// PASSWORD CHECK

  $pwdHashed = $user["password"];
  $checkPwd = password_verify($pwd, $pwdHashed);

  if ($checkPwd === false) {
    header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/login.php?error=wrongpassword");
    exit();
  }
  else if ($checkPwd === true) {
    session_start();
    $_SESSION["user_id"] = $user["id"];
    header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/index.php?connection=success");
    exit();
  }
}
