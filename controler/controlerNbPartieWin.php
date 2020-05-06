

<?php

require_once('../Modele/connect.php');

session_start();



if (!isset($_SESSION['user'])) {
        header("Location: connexion.php");
        die();
    }

$psudo=$_SESSION['nom']['pseudo'];
$stmt = $bdd->prepare('UPDATE `users` SET `partie_win`= partie_win+1 WHERE pseudo = :pseudo'); // requete vers database
        $stmt->bindParam("pseudo", $psudo); // requete vers database
        $stmt->execute(); // requete vers database



 header('Location: ../Vue/Win.php');

