<?php
session_start();

if (!isset($_SESSION['nom'])) {
    header("Location: connexion.php");
}

if (isset($_SESSION["mots"])) {
    $_SESSION["mots"]=NULL;
}
if (isset($_SESSION["mots_decompo"])) {
    $_SESSION["mots_decompo"]=NULL;
}
if (isset($_SESSION["mots_a_trouver"])) {
    $_SESSION["mots_a_trouver"]=NULL;
}
if (isset($_SESSION["lettre"])) {
    $_SESSION["lettre"]=NULL;
}
if (isset($_SESSION["over_use"])) {
    $_SESSION["over_use"]=NULL;
}
// var_dump($_SESSION);

// var_dump ($_SESSION['nom']['pseudo']); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <form action="../controler/controlerNbPartie.php" method=post>
        <input type="password" name="mots"maxlength="30">
        <input type="submit" value="envoyé">
    </form>

</body>

</html>