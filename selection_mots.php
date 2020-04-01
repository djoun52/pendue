<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <form action="lettre.php" method=post>
        <input type="password" name="mots"maxlength="30">
        <input type="submit" value="envoyé">
    </form>
</body>

</html>