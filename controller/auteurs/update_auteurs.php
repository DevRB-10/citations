<?php

require ROOT . '/controller/auteurs/update.php';

if(isset($_POST['auteur'], $_POST['bio'])){
    if(!empty($_POST['auteur']) && !empty($_POST['bio'])){

        if(auteurs_update($pdo, ['auteur'=>$_POST['auteur'], 'bio'=>$_POST['bio']], $aut['id'])){
            $msg = [
                'css'=>'is_success',
                'txt'=>'Votre auteur a été modifié'
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
header('Location: index.php?controller=auteurs');