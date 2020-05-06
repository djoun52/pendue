<?php
session_start();
require_once('../object/objectPlayeur.php');

var_dump($_SESSION);


if (!isset($_SESSION['user'])) {
  header("Location: connexion.php");
  die();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
      <link rel="stylesheet" href="style.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div id="wrapper">
<a href="../controler/ControlerAuth.php?nom=deco">deconnexion</a>
<?php
if( $_GET["nom"] == "game"){
?>
<a href="lettre.php">reprendre la partie</a> 
<?php
}else{
?>
<a href="newGame.php">commencer un partie</a> 
<?php
}

echo $pler->infoplayer();
?>



</div>
</body>
</html>