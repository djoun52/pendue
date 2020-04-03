<?php
session_start();
if (!isset($_SESSION['nom'])) {
    header("Location: connexion.php");
}
// var_dump($_SESSION);

$r=100/($_SESSION['nom']['partie']/$_SESSION['nom']['partie_win']);
$stat=round($r,2)
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
<?php
if($_GET['nom'] == "noGame"){
?>
<a href="newGame.php">commencer un partie</a> 
<?php
}else{
?>
<a href="lettre.php">reprendre la partie</a> 
<?php
}
?>
<h1>Profile Joueurs</h1>

<p>pseudo joueur : <?php echo $_SESSION['nom']['pseudo']  ?></p>
<p>nom joueur : <?php echo $_SESSION['nom']['nom']  ?></p>
<p>prenom joueur : <?php echo $_SESSION['nom']['prenom']  ?></p>


<h2>Statistique</h2>
<p>partie joué : <?php echo $_SESSION['nom']['partie']  ?></p>
<p>partie gagné : <?php echo $_SESSION['nom']['partie_win']  ?></p>
<p>pourcentage de victoire : <?php echo $stat ?></p>

</div>
</body>
</html>