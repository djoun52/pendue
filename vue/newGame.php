<?php
session_start();
if (!isset($_SESSION['nom'])) {
    header("Location: connexion.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
<div id="wrapper">
<a href="../controler/ControlerAuth.php?nom=deco">deconnexion</a>
<a href="../controler/ControlerAuth.php?nom=profilNoGame">profil</a> 

  <a href="../controler/controlerNbPartie.php">nouvelle partie</a>
</div>
</body>

</html>