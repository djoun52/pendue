<?php
session_start();
// var_dump($_SESSION);
// var_dump($_POST);



if (!isset($_POST['lettre'])) {
    header("Location: ./vue/selection_mots.php");
    die();
}

$r = 0;
$_SESSION['lettre'] = $_POST;
$a = $_SESSION["lettre"]["lettre"];

if (strlen($a) != 1) {
    header("Location:  ../vue/lettre.php");
    die;
}

foreach ($_SESSION["over_use"] as $key => $value) {
    if ($a == $value) {
        header("Location:  ../vue/lettre.php");
        die;
    }
}
array_push($_SESSION["over_use"], $a);
// var_dump($_SESSION["over_use"]);

// var_dump($_SESSION);
$i = 0;
$k = 0;

foreach ($_SESSION["mots_decompo"] as $key => $value) {
    if ($a == $value) {
        $remplac = [$key => $value];
        $_SESSION["mots_a_trouver"] = array_replace($_SESSION["mots_a_trouver"], $remplac);
        $i++;
    } else {
        $k++;
        $i++;
    }
}
if ($i == $k) {
    $_SESSION["erreur"] = $_SESSION["erreur"] + 1;
}
foreach ($_SESSION["mots_a_trouver"] as $key => $value) {
    if ($value == "_ ") {
        $r++;
    }
}
if ($r == 0) {
    $_SESSION["victory"] = true;
}
// var_dump( $_SESSION["mots_a_trouver"] );

if ($_SESSION["victory"] == true) {
    header("Location: ./controlerNbPartieWin.php");

    die;
}
if ($_SESSION["erreur"] == 7) {
    header("Location: ../vue/lose.php");
    die;
}
header("Location: ../vue/lettre.php");
