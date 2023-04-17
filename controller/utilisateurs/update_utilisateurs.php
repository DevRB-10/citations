<?php

require ROOT . '/controller/utilisateurs/update.php';

if(isset($_POST['prenom'], $_POST['nom'], $_POST['mail'], $_POST['is_admin'], $_POST['id'])){
    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['is_admin']) && !empty($_POST['id'])){
        $is_admin_str = $_POST['is_admin'] == 'oui' ? 1 : 0;

        if(utilisateurs_update($pdo, ['prenom'=>$_POST['prenom'], 'nom'=>$_POST['nom'], 'mail'=>$_POST['mail'], 'is_admin'=>$is_admin_str, 'id'=>$_POST['id']], $util['id'])){
            $msg = [
                'css'=>'is_success',
                'txt'=>'Votre utilisateur a été modifié'
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
header('Location: index.php?controller=utilisateurs');