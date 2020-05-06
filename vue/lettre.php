<?php
session_start();
// var_dump($_SESSION);
// var_dump($_POST);




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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <a href="../controler/ControlerAuth.php?nom=deco">deconnexion</a>
        <a href="./profil.php?nom=game">profil</a>

        <form id="chooseLetter" action="../controler/controlerGame.php" method=post>
            <input type="text" name="lettre" maxlength="1">
            <input type="submit" value="envoyé">
        </form>

        <div>
            <?php
            // var_dump($_SESSION["mots_a_trouver"]);
            foreach ($_SESSION["mots_a_trouver"] as $value) {
                echo $value;
            }
            ?>
        </div>  
        <section>
            <div id="letter_use" >
            <p>lettres déja utilisé :  </p>
            <?php
            foreach ($_SESSION["over_use"] as $value)
                echo $value . ' ';
            ?>
        </div>

        <div>
            <?php
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
            ?>
        </div>
        </section>  
        
 



    </div>
</body>

</html>