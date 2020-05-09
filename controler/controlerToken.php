<?php


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
