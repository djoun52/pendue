<?php

require_once('../Modele/connect.php');

session_start();
// var_dump($_SESSION);
// var_dump($_POST);





if (!isset($_SESSION['nom'])) {
    header("Location: connexion.php");
}

if (!isset($_POST["mots"])) {
    header("Location: selection_mots.php");
    die();
}

if (isset($_POST['mots'])) {
    if (is_string($_POST['mots'])) {
        if ($_POST['mots'] == NULL) {
            header("Location: selection_mots.php");
            die;
        }

        if (strlen(($_POST['mots']) > 30)) {
            // header("Location: selection_mots.php");
            die;
        }
        $stmt = $bdd->prepare('UPDATE `users` SET `partie`= partie+1 WHERE pseudo = $_session[nom][pseudo]'); // requete vers database
        $stmt->bindParam("pseudo", $_POST['u_pseudo']); // requete vers database
        $stmt->execute(); // requete vers database
        $a = 0;
        $_SESSION["victory"] = false;
        $_SESSION["over_use"] = [" "];
        $_SESSION["erreur"] = 0;
        $_SESSION['mots'] = $_POST;
        // var_dump($_SESSION['mots']);

        // echo $_POST["mots"];
        $_SESSION["mots_decompo"] = str_split($_POST["mots"]);
        // var_dump($_SESSION["mots_decompo"]);
        $_SESSION["mots_a_trouver"] = [];
        foreach ($_SESSION["mots_decompo"] as $value) {
            if ($value == " ") {
                // header("Location: selection_mots.php");
                die;
            }
            array_push($_SESSION["mots_a_trouver"], "_ ");
        }
        header('Location: ../Vue/lettre.php');

    } else {
        header("Location: selection_mots.php");
    }
}




