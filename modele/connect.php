<?php

$dsn    = "mysql:host=localhost;dbname=pendu";
$dbuser = "root";
$dbpass = "";
try {
    $GLOBALS['bdd'] = new PDO($dsn, $dbuser, $dbpass);
    $GLOBALS['bdd']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $GLOBALS['bdd']->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $GLOBALS['bdd']->exec("SET CHARACTER SET utf8");
} catch (PDOException $err) {
    $now = new DateTime("", new DateTimeZone('Europe/Paris'));
    $now = $now->format("d-M-Y H:i:s");
    $msg = $now . " - ERREUR BDD : " . $err->getMessage() . PHP_EOL;
    file_put_contents('log.txt', $msg, FILE_APPEND);
    die();
}
