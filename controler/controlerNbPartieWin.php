

<?php

require_once('../Modele/connect.php');

session_start();


$stmt = $bdd->prepare('UPDATE `users` SET `partie_win`= partie_win+1 WHERE pseudo = pseudo'); // requete vers database
        $stmt->bindParam("pseudo", $_POST['u_pseudo']); // requete vers database
        $stmt->execute(); // requete vers database



 header('Location: ../Vue/Win.php');

