<?php
session_start();
if (!isset($_SESSION['nom'])) {
    header("Location: connexion.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body>
<div id="wrapper">
<a href="../controler/controlerDeconnexion.php">deconnexion</a>


<h1>PERDU</h1>
<img src="../image/8.png">
<br>
<p>le mots était <?php $_SESSION['mots']?></p>
<br>
<a href="newGame.php">dommage retente ta chance</a> 
</div>
</body>
</html>