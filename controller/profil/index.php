<?php

require ROOT . '/model/utilisateurs.model.php';

if(isset($_GET['action']) && $_GET['action'] === 'deconnexion'){
    unset($_SESSION['profil']);
}

if(isset($_POST['mail'], $_POST['mot_de_passe'])){
    $hash = get_password($pdo, $_POST['mail']);
    if(is_string($hash) && password_verify($_POST['mot_de_passe'], $hash)){
        $_SESSION['profil'] = fetchAllByMail($pdo, $_POST['mail']);
        header('Location: index.php');
        
    }
    else{
        echo 'va chier';
    }
}

if(!isset($_SESSION['profil'])){
    require ROOT . '/view/utilisateurs/connexion.php';
}