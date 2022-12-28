
<form method="post">
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="password">Mot de passe:</label><br>
  <input type="password" id="password" name="password" required><br><br>
  <input type="submit" value="Se connecter">
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