

<?php
session_start();
require_once('../Modele/connect.php');
require_once('../object/objectPlayeur.php');




if (!isset($_SESSION['user'])) {
        header("Location: connexion.php");
        die();
    }

$psudo=$pler->getPseudo();
$stmt = $bdd->prepare('UPDATE `users` SET `partie_win`= partie_win+1 WHERE pseudo = :pseudo'); // requete vers database
        $stmt->bindParam("pseudo", $psudo); // requete vers database
        $stmt->execute(); // requete vers database
        
        
        
        $_SESSION['user']['partie_win']++;


 header('Location: ../Vue/Win.php');

