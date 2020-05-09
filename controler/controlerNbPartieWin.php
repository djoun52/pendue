

<?php
session_start();
require_once('../Modele/connect.php');
require_once('../object/objectPlayeur.php');




if (!isset($_SESSION['user'])) {
        header("Location: connexion.php");
        die();
    }

$psudo=$pler->getPseudo();
addNbPartiWin($psudo);
        
        
        
        $_SESSION['user']['partie_win']++;


 header('Location: ../Vue/Win.php');

