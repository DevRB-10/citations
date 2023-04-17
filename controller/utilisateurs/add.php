<?php

if(isset($_POST['prenom'], $_POST['nom'], $_POST['mail'], $_POST['is_admin'])){
    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['is_admin'])){
        if(utilisateurs_add($pdo, $_POST['prenom'], $_POST['nom'], $_POST['mail'], $_POST['is_admin'])){
            $msg = [
                'css'=>'is_success',
                'txt'=>'Votre utilisateur a été ajouté'
            ];
        }
        else{
            $msg = [
                'css'=>'is_warning',
                'txt'=>'MorteCouille'
            ];
        }
    }
    else{
        $msg = [
            'css'=>'is_success',
            'txt'=>'Merci de compléter tous les champs'
        ];
    }
}

$_SESSION['msg'] = $msg;
header('Location: index.php?controller=utilisateurs&action=list');

// INSERT INTO `utilisateurs` (`id`, `prenom`, `nom`, `mail`, `mot_de_passe`, `date_modif`, `token`, `is_admin`) VALUES (NULL, 'toto', 'zero', 'toto@zero.fr', '1234', current_timestamp(), NULL, '0');