<?php


if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    die();
}
