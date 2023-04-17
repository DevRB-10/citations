<?php

if(isset($_POST['auteur'], $_POST['bio'])){
    if(!empty($_POST['auteur']) && !empty($_POST['bio'])){
        if(auteurs_add($pdo, $_POST['auteur'], $_POST['bio'])){
            $msg = [
                'css'=>'is_success',
                'txt'=>'Votre auteur a été ajouté'
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
header('Location: index.php?controller=auteurs&action=list');