
<?php
session_start();
// var_dump($_SESSION);
if(isset($_SESSION)){
    session_destroy();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vue/style.css">

    <title>Document</title>
</head>
<body>
    
    <!-- céation de compte joueur -->
    <a href=" ./vue/inscription.php">Inscription</a>

    <!-- identification  -->
    <a href="./vue/connexion.php">Identification</a>










</body>
</html>