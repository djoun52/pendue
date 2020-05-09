

<?php
session_start();
if (!isset($_SESSION['user'])) {
        header("Location: connexion.php");
        die();
    }




    unset($_SESSION['mots']);
    unset($_SESSION['victory']);
    unset($_SESSION['over_use']);
    unset($_SESSION['erreur']);
    unset($_SESSION['mots_decompo']);
    unset($_SESSION['mots_a_trouver']);
    unset($_SESSION['lettre']);




 header('Location: ../Vue/newGame.php');

