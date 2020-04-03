<?php

require_once('../Modele/connect.php');

session_start();

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
                header('Location: ../Vue/selection_mots.php');
            } else {
                var_dump($result);

                $_SESSION['error_msg'] = 'mauvais mot de passe';
                header('Location: ../Vue/connexion.php');
                die();
            }
        } else {
            //utlisateur nexiste pas 
            $_SESSION['error_msg'] = "L'utilisateur n'existe pas";
            header('Location: ../Vue/connexion.php');
            die();
        }
    } else {
        // remplir les champs
        $_SESSION['error_msg'] = 'Veuillez remplir les champs';
        header('Location: ../Vue/connexion.php');
        die();
    }
}


if ($_GET['nom'] == "register") {

   

    $password = filter_input(INPUT_POST, 'u_password', FILTER_DEFAULT);
    $passworconfirm = filter_input(INPUT_POST, 'u_confirmer_password', FILTER_DEFAULT);
    $pseudo = filter_input(INPUT_POST, 'u_pseudo', FILTER_DEFAULT);
    $prenom = filter_input(INPUT_POST, 'u_prenom', FILTER_DEFAULT);
    $nom = filter_input(INPUT_POST, 'u_nom', FILTER_DEFAULT);
    
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if (!empty($_POST['u_password']) && !empty($_POST['u_confirmer_password']) && !empty($_POST['u_nom']) && !empty($_POST['u_pseudo'])) {
        $stmt = $bdd->prepare('SELECT * FROM users WHERE pseudo= :pseudo'); // requete vers database
        $stmt->bindParam("pseudo", $_POST['u_pseudo']); // requete vers database
        $stmt->execute(); // requete vers database
        $result = $stmt->fetch();
        if ($result == false) {
            if ($uppercase || $lowercase || $number || strlen($password) > 8){
                if ($_POST['u_password'] == $_POST['u_confirmer_password']) {
                    $hashage = password_hash($_POST['u_password'], PASSWORD_DEFAULT);
                    $stmt = $bdd->prepare("INSERT INTO users (nom, prenom, pseudo, password, partie, partie_win) VALUES (?,?,?,?,?,?)");
                    $stmt->execute(array($_POST['u_nom'], $_POST['u_prenom'],  $_POST['u_pseudo'], $hashage, 0, 0));
                    $_SESSION['error_msg'] = '';
                    header('Location: ../Vue/connexion.php');
                    die();
                } else {
                    $_SESSION['error_msg'] = 'les mot de passe ne concorde pas';
                    header('Location: ../Vue/inscription.php');
                    die();
                }
            } else {
                $_SESSION['error_msg'] = 'la mot de passe doit faire entre 8 et 16 caractere au moins 1 Majuscule 1 chiffre et 1 miniscules';
                header('Location: ../Vue/inscription.php');
                die();
            }
        } else {
            $_SESSION['error_msg'] = 'Utilsateur existe déjà';
            header('Location: ../Vue/inscription.php');
            die();
        }
    } else {
        $_SESSION['error_msg'] = 'Veuillez remplir les champs';
        header('Location: ../Vue/inscription.php');
        die();
    }
}

if ($_GET['nom'] == 'deco') {
    session_start();
    unset($_SESSION['nom']);
    header("Location: ../Vue/index.php");
    die();
}

