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
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
<div id="wrapper">
<a href="../controler/controlerDeconnexion.php">deconnexion</a>
<a href="profil.php?nom=noGame">profil</a> 

  <a href="../controler/controlerNbPartie.php">nouvelle partie</a>
</div>
</body>

</html>