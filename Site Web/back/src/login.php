
<?php
  // Récupération des données de connexion soumises par l'utilisateur
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connexion à la base de données
  $conn = new mysqli("localhost", "monnomdutilisateur", "monmotdepasse", "nomdelabasededonnées");

  // Vérification des données de connexion
  $sql = "SELECT * FROM utilisateurs WHERE adresse_mail='$email' AND mot_de_passe='$password'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // Si les données sont correctes, affiche un message de bienvenue
    echo "Bienvenue, vous êtes connecté!";
  } else {
    // Si les données sont incorrectes, affiche un message d'erreur
    echo "Adresse e-mail ou mot de passe incorrect. Veuillez réessayer.";
  }

  $conn->close();
?>
