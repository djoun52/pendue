<?php
session_start();

require_once('../controler/controlerMain.php');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
<div id="wrapper">
        <title>Document</title>
</head>
<body>
<a href="../controler/ControlerAuth.php?nom=deco">deconnexion</a>


    <p> C'est la victiore </p><br>
    <p>
        Veut tu <a href="../controler/controlerEndGame.php">rejouer</a>
 </p> 

</div>
    
</body>
</html>