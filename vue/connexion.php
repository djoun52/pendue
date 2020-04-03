<?php
session_start();
var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href=" ./inscription.php">Inscription</a>
<a href="../controler/controlerDeconnexion.php">deconnexion</a>

    <form method="post" action="../Controler/ControlerAuth.php?nom=connect">
        pseudo : <input type="text" name="u_pseudo" size="20"><br>
        password : <input type="text" name="u_password" size="12">
        <input type="submit" value="OK">
    </form>
<?php

if (isset($_SESSION['error_msg'])) {
    echo $_SESSION['error_msg'];

}
?>



</body>
</html>