<?php

require_once('../modele/connect.php');
require_once('../object/objectMots.php');

session_start();
// var_dump($_SESSION);
// var_dump($_POST);
// echo $_SESSION['nom']['pseudo'];


if (!isset($_SESSION['nom'])) {
    header("Location: connexion.php");
}


$m = ['salut', 'marcher', 'saperlipopette', ''];
$lm = new Mots($m);
$j = $lm->getRandomMots();
echo $j;

if (!isset($_SESSION['nom'])) {
    header("Location: connexion.php");
}


$_SESSION["mots"] = $j;





$psudo = $_SESSION['nom']['pseudo'];
$stmt = $bdd->prepare('UPDATE `users` SET `partie`= partie+1 WHERE pseudo = :pseudo '); // requete vers database
$stmt->bindParam("pseudo", $psudo); // requete vers database
$stmt->execute(); // requete vers database

$a = 0;
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
