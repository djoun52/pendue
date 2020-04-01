<?php
session_start();

if (!isset($_POST)) {
    header("Location: selection_mots.php");
    die();
}

if (isset($_POST['mots'])) {
    if (is_string($_POST['mots'])) {
        if ($_POST['mots'] == NULL) {
            header("Location: selection_mots.php");
            die;
        }

        if (strlen(($_POST['mots']) > 30)) {
            header("Location: selection_mots.php");
            die;
        }
        $a = 0;
        $_SESSION["victory"] = false;
        $_SESSION["over_use"] = [" "];
        $_SESSION["erreur"] = 0;
        $_SESSION['mots'] = $_POST;
        // var_dump($_SESSION['mots']);

        // echo $_POST["mots"];
        $_SESSION["mots_decompo"] = str_split($_POST["mots"]);
        // var_dump($_SESSION["mots_decompo"]);
        $_SESSION["mots_a_trouver"] = [];
        foreach ($_SESSION["mots_decompo"] as $key => $value) {
            if ($value == " ") {
                header("Location: selection_mots.php");
                die;
            }
            array_push($_SESSION["mots_a_trouver"], "_ ");
        }
    } else {
        header("Location: selection_mots.php");
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    if ($_SESSION["victory"] == true) {
        echo "C'est la victiore";
        echo "<br>";
        echo "Veut tu " . '<a href="selection_mots.php">rejouer</a> ';
        die;
    }
    if ($_SESSION["erreur"] == 7) {
        echo "PERDU";
        echo '<img src="image/8.png">';
        echo "<br>";
        echo "le mots était " .  $_SESSION['mots']["mots"];
        echo "<br>";
        echo '<a href="selection_mots.php">dommage retente ta chance</a> ';



        die;
    }
    // var_dump($_SESSION["over_use"]);

    ?>
    <form action="../controler/controler_game.php" method=post>
        <input type="text" name="lettre" maxlength="1">
        <input type="submit" value="envoyé">
    </form>
    <?php
    // var_dump($_SESSION["mots_a_trouver"]);
    foreach ($_SESSION["mots_a_trouver"] as $key => $value) {
        echo $value;
    }
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

    foreach ($_SESSION["over_use"] as $key => $value)
        echo $value . ' ';
    ?>


</body>

</html>