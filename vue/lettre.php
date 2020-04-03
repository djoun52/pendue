<?php
session_start();
var_dump($_SESSION);
var_dump($_POST);






?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form action="../controler/controlerGame.php" method=post>
        <input type="text" name="lettre" maxlength="1">
        <input type="submit" value="envoyé">
    </form>
    <?php
    // var_dump($_SESSION["mots_a_trouver"]);
    foreach ($_SESSION["mots_a_trouver"] as $value) {
        echo $value;
    }
    if ($_SESSION["erreur"] == 0) {
        echo '<img src="../image/1.png">';
    } elseif ($_SESSION["erreur"] == 1) {
        echo '<img src="../image/2.png">';
    } elseif ($_SESSION["erreur"] == 2) {
        echo '<img src="../image/3.png">';
    } elseif ($_SESSION["erreur"] == 3) {
        echo '<img src="../image/4.png">';
    } elseif ($_SESSION["erreur"] == 4) {
        echo '<img src="../image/5.png">';
    } elseif ($_SESSION["erreur"] == 5) {
        echo '<img src="../image/6.png">';
    } elseif ($_SESSION["erreur"] == 6) {
        echo '<img src="../image/7.png">';
    }

    foreach ($_SESSION["over_use"] as $value)
        echo $value . ' ';
    ?>


</body>

</html>