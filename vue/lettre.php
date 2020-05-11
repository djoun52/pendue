<?php
session_start();
// var_dump($_SESSION);
// var_dump($_POST);



require_once('../controler/controlerMain.php');

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">

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

            echo printError($_SESSION["erreur"]);
       
            ?>
        </div>
        </section>  
        
 



    </div>
</body>

</html>