<?php
session_start();
require_once('../object/objectPlayeur.php');
require_once('../modele/connect.php');
require_once('../object/objectMots.php');
require_once('../object/objectGame.php');



// var_dump($_SESSION);
// var_dump($_POST);
// echo $_SESSION['nom']['pseudo'];


if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    die();
}


$j = $lm->getRandomMots();



$p = new Game($j);

$_SESSION["mots"] = $j;
// changé avec object game




$psudo = $pler->getPseudo();
$stmt = $bdd->prepare('UPDATE `users` SET `partie`= partie+1 WHERE pseudo = :pseudo '); // requete vers database
$stmt->bindParam("pseudo", $psudo); // requete vers database
$stmt->execute(); // requete vers database

$_SESSION['user']['partie_win']++;
$_SESSION["victory"] = false;
$_SESSION["over_use"] = [" "];
$_SESSION["erreur"] = 0;
// var_dump($_SESSION['mots']);

// echo $_POST["mots"];
$_SESSION["mots_decompo"] = str_split($_SESSION["mots"]);
// var_dump($_SESSION["mots_decompo"]);
$_SESSION["mots_a_trouver"] = [];
foreach ($_SESSION["mots_decompo"]  as $value) {
   array_push($_SESSION["mots_a_trouver"],"_ ") ;
}
header("Location: ../vue/lettre.php");
