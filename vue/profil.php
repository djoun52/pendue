<?php
session_start();
if (!isset($_SESSION['nom'])) {
    header("Location: connexion.php");
}
// var_dump($_SESSION);
if ($_SESSION['nom']['partie_win'] !=0){
  $r=100/($_SESSION['nom']['partie']/$_SESSION['nom']['partie_win']);
$stat=round($r,2);
}else{
  $stat=0;
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
if(!isset($_GET['nom'])){
?>
<a href="lettre.php">reprendre la partie</a> 
<?php
}else{
?>
<a href="newGame.php">commencer un partie</a> 
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