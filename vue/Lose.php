<?php
session_start();
require_once('../controler/controlerMain.php');
// var_dump($_SESSION);
// var_dump($_POST);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body>
<div id="wrapper">
<a href="../controler/ControlerAuth.php?nom=deco">deconnexion</a>


<h1>PERDU</h1>
<img src="../image/8.png">
<br>
<p>le mots était <?php echo $_SESSION['mots'] ;?> </p>
<br>
<a href="../controler/controlerEndGame.php">dommage retente ta chance</a> 
</div>
</body>
</html>