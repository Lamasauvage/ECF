
<form method="post">
  <input type="email" name="email" placeholder="Email" id="email" required>
  <input type="password" name="password" placeholder="Mot de passe" id="password" required>
  <input type="submit" name="formsend" id="formsend">
</form>

<?php
  if(isset($_POST['formsend'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){
      echo "Email : " .$email . "<br/>";
      echo "Password : " .$password;
    }
  }

?>