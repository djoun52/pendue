<?php
session_start();
require_once('../Modele/connect.php');
if (isset($_COOKIE['user'])) {
    $secret = htmlspecialchars($_COOKIE["user"]);

    // if (!$secret){
    //     header("Location: ../index.php");
    //     die();
    // }
    getUsersBySecret($secret);
    
}
