<?php
session_start();
// var_dump($_SESSION);
$token = bin2hex(random_bytes(24));

if (!isset($_SESSION['token']))
    {
        $_SESSION['token'] = $token;
    }else
    {
        $token = $_SESSION['token'];
    }

    if(isset($_SESSION['user']) && !hash_equals($_SESSION['token'], $_SESSION['user']['token']))
    {
        header("../controler/ControlerAuth.php?nom=deco");
    }


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_co.css">
    <title>Document</title>
</head>

<body>
    <div id="wrapper">



        <div class="nav-wrapper">
            <nav>
                <div class="navigation">
                    <ul class="nav-items">
                        <li><a href=" ../controler/ControlerAuth.php?nom=inscri">Inscription</a></li>
                        <li><a href="../controler/ControlerAuth.php?nom=deco">deconnexion</a></li>
                    </ul>
                    <div class="nav-toogler"></div>
                </div>
            </nav>
        </div>


        <form id="formu" method="post" action="../Controler/ControlerAuth.php?nom=connect">
            <div class="flex" >
                <label id="labPseudo" for="u_nom">pseudo : </label>
                <input type="text" name="u_pseudo" size="15">
            </div>
            <div class="flex">
                <label id="labPassword" for="u_nom">password : </label>
                <input type="text" name="u_password" size="15">
            </div>
            <div class="flex">
                <label  id="option">
                <input type="checkbox" name="auto" > Se souvenire de moi</label>
            </div>
            <input type="hidden" value="<?= $token ?>" name="token">
            <div class="flex">
                <input type="submit" value="OK">
            </div>
        </form>
        <?php

        if (isset($_SESSION['error_msg'])) {
            echo $_SESSION['error_msg'];
        }
        ?>




        <object>
            <param name="autostart" value="true">
            <param name="src" value="sound.mp3">
            <param name="autoplay" value="true">

            <?php
            if (!isset($_SESSION['error_msg'])) {
            ?>
                <embed src="./public/sound/la-cite-de-la-peur-meurs-pourriture-communiste.mp3" autoplay="true" autostart="True" type="audio/mp3" width=0 />
            <?php
            } elseif ($_SESSION['nbErreurMsg'] == 1) {
            ?>
                <embed src="./public/sound/il-dit-quil-voit-pas-le-rapport-la-cite-de-la-peur.mp3" autoplay="true" autostart="True" type="audio/mp3" width=0 />

            <?php
            } elseif ($_SESSION['nbErreurMsg'] == 2) {
            ?>
                <embed src="./public/sound/comment-voulez-vous-quavec-le-truc-je-fasse-le-chose-la-cite-de-la-peur.mp3" autoplay="true" autostart="True" type="audio/mp3" width=0 />
            <?php
            } elseif ($_SESSION['nbErreurMsg'] == 3) {
            ?>
                <embed src="./public/sound/tu-bluffes-martoni.mp3" autoplay="true" autostart="True" type="audio/mp3" width=0 />
            <?php
            } elseif ($_SESSION['nbErreurMsg'] == 4) {
            ?>
                <embed src="../public/sound/aie-eu.mp3" autoplay="true" autostart="True" type="audio/mp3" width=0 />
            <?php
                $_SESSION['nbErreurMsg'] = 0;
            }
            ?>
        </object>
    </div>


    <script>
        let navWrapper = document.querySelector('.nav-wrapper'),
            navToogler = document.querySelector('.nav-toogler')

        navToogler.addEventListener('click', function(event) {
            navWrapper.classList.toggle('active')
        })
    </script>
</body>

</html>