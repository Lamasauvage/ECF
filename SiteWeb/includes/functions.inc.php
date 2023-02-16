<?php

// SIGNUP PAGE

function emptyInputSignup($email, $pwd, $pwdRepeat, $guests, $allergy, $allergy_type = '') {
  $result = false;
  if (empty($email) || empty($pwd) || empty($pwdRepeat) || empty($guests) || empty($allergy) ) {
    $result = true;
  }else if ($allergy === "yes" && (empty($allergy_type) || $allergy_type === "other-allergy" && empty($_POST["other-allergy"]))) {
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
function createUser($conn, $email, $pwd, $pwdRepeat, $guests, $allergy, $allergy_type) {
  if ($allergy_type === 'other-allergy') {
    $allergy_type = $_POST['other-allergy'];
  }
  $sql = "INSERT INTO users (email, password, guests, allergy, allergy_type) VALUES (?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
   header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/signup.php?error=stmtfailed");
   exit();
  }
  $allergy = ($allergy === 'yes') ? 1 : 0;
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt, "ssiss", $email, $hashedPwd, $guests, $allergy, $allergy_type);
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
    var_dump($user);
    $_SESSION["user_id"] = $user["ID"];
    $_SESSION["email"] = $user["email"];
    header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/index.php?connection=success");
    exit();
  }
}
