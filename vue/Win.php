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
<div id="wrapper">
        <title>Document</title>
</head>
<body>
<a href="../controler/controlerDeconnexion.php">deconnexion</a>


    <p> C'est la victiore </p><br>
    <p>
        Veut tu <a href="newGame.php">rejouer</a>
 </p> 

</div>
    
</body>
</html>