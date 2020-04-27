<?php

require_once('../Modele/connect.php');

session_start();
if(!isset($_SESSION['nbErreurMsg'])){
    $_SESSION['nbErreurMsg']=0;
}
// var_dump($_POST);


//  die();




//  $_SESSION['nom'] = $_POST['u_email'];
//  header('Location: ../Vue/profil.php');

if ($_GET['nom'] == "connect") {
    if (!empty($_POST['u_pseudo']) && !empty($_POST['u_password'])) {
        $stmt = $bdd->prepare('SELECT * FROM users WHERE pseudo = :pseudo'); // requete vers database
        $stmt->bindParam("pseudo", $_POST['u_pseudo']); // requete vers database
        $stmt->execute(); // requete vers database
        $result = $stmt->fetch();
        if ($result !== false) {
            if (password_verify($_POST['u_password'], $result['password'])) {
                var_dump($result);
                $_SESSION['nom'] = $result;
                // unset($_SESSION['error_msg']);
                $_SESSION['error_msg'] = '';
                header('Location: ../Vue/newGame.php');
            } else {
                var_dump($result);

                $_SESSION['error_msg'] = '<p class="error">mauvais mot de passe</p>';
                $_SESSION['nbErreurMsg']++;
                header('Location: ../Vue/connexion.php');
                die();
            }
        } else {
            //utlisateur nexiste pas 
            $_SESSION['error_msg'] = "<p class='error'>L'utilisateur n'existe pas</p>";
            $_SESSION['nbErreurMsg']++;
            header('Location: ../Vue/connexion.php');
            die();
        }
    } else {
        // remplir les champs
        $_SESSION['error_msg'] = '<p class="error">Veuillez remplir les champs</p>';
        $_SESSION['nbErreurMsg']++;
        header('Location: ../Vue/connexion.php');
        die();
    }
}


if ($_GET['nom'] == "register") {

   

    $passworconfirm = trim(filter_input(INPUT_POST, 'u_confirmer_password', FILTER_SANITIZE_URL));
    $pseudo = trim(filter_input(INPUT_POST, 'u_pseudo', FILTER_SANITIZE_URL));
    $prenom = trim(filter_input(INPUT_POST, 'u_prenom', FILTER_SANITIZE_URL));
    $nom = trim(filter_input(INPUT_POST, 'u_nom', FILTER_SANITIZE_URL));
    
    $password = filter_input(INPUT_POST, 'u_password', FILTER_VALIDATE_REGEXP,
    array("options" => array("regexp" => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/")));

    if (!empty($_POST['u_password']) && !empty($_POST['u_confirmer_password']) && !empty($_POST['u_nom']) && !empty($_POST['u_pseudo'])) {
        $stmt = $bdd->prepare('SELECT * FROM users WHERE pseudo= :pseudo'); // requete vers database
        $stmt->bindParam("pseudo", $_POST['u_pseudo']); // requete vers database
        $stmt->execute(); // requete vers database
        $result = $stmt->fetch();

       
        

        if ($result == false) {

           
            if ($password && strlen($password) > 8){
                if ($_POST['u_password'] == $_POST['u_confirmer_password']) {
                    $hashage = password_hash($_POST['u_password'], PASSWORD_DEFAULT);
                    $stmt = $bdd->prepare("INSERT INTO users (nom, prenom, pseudo, password, partie, partie_win) VALUES (?,?,?,?,?,?)");
                    $stmt->execute(array($_POST['u_nom'], $_POST['u_prenom'],  $_POST['u_pseudo'], $hashage, 0, 0));
                    $_SESSION['error_msg'] = '';
                    header('Location: ../Vue/connexion.php');
                    die();
                } else {
                    $_SESSION['error_msg'] = '<p class="error"> utilisateur ou mots de passe incorect</p>';
                    $_SESSION['nbErreurMsg']++;
                    header('Location: ../Vue/inscription.php');
                    die();
                }
            } else {
                $_SESSION['error_msg'] = '<p class="error">lutilisateur ou mots de passe incorect</p>';
                $_SESSION['nbErreurMsg']++;
                header('Location: ../Vue/inscription.php');
                die();
            }
        } else {
            $_SESSION['error_msg'] = '<p class="error"> utilisateur ou mots de passe incorect</p>';
            $_SESSION['nbErreurMsg']++;
            header('Location: ../Vue/inscription.php');
            die();
        }
    } else {
        $_SESSION['error_msg'] = '<p class="error">Veuillez remplir les champs </p>';
        $_SESSION['nbErreurMsg']++;
        header('Location: ../Vue/inscription.php');
        die();
    }
}

if ($_GET['nom'] == 'deco') {
    session_start();
    session_destroy();
    header("Location: ../index.html");
    die();
}

if ($_GET['nom'] == 'profilNoGame') {
    session_start();
    $psudo = $_SESSION['nom']['pseudo'];
    $stmt = $bdd->prepare('SELECT * FROM users WHERE pseudo= :pseudo'); // requete vers database
    $stmt->bindParam("pseudo", $psudo); // requete vers database
    $stmt->execute(); // requete vers database
    $result = $stmt->fetch();
    $_SESSION['nom'] = $result;
    header("Location: ../vue/profil.php?nom=noGame");
    die();
}
if ($_GET['nom'] == 'profilGame') {
    session_start();
    $psudo = $_SESSION['nom']['pseudo'];
    $stmt = $bdd->prepare('SELECT * FROM users WHERE pseudo= :pseudo'); // requete vers database
    $stmt->bindParam("pseudo", $psudo); // requete vers database
    $stmt->execute(); // requete vers database
    $result = $stmt->fetch();
    $_SESSION['nom'] = $result;
    header("Location: ../vue/profil.php");
    die();
}



if ($_GET['nom'] == 'identi') {
    session_start();
    unset($_SESSION['error_msg']);
    unset($_SESSION['nbErreurMsg']);
    header("Location: ../vue/connexion.php");
    die();
}
if ($_GET['nom'] == 'inscri') {
    session_start();
    unset($_SESSION['error_msg']);
    unset($_SESSION['nbErreurMsg']);
    header("Location: ../vue/inscription.php");
    die();
}