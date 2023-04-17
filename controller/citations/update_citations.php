<?php

require ROOT . '/controller/citations/update.php';

if(isset($_POST['citation'], $_POST['auteur'], $_POST['explication'])){
    if(!empty($_POST['citation'])){
        $auteurs_id = empty($_POST['auteur']) ? NULL : $_POST['auteur'];
        $explication = empty($_POST['explication']) ? NULL : $_POST['explication'];

        if(citations_update($pdo, ['citation'=>$_POST['citation'], 'explication'=>$explication, 'auteurs_id'=>$auteurs_id], $cit['id'])){
            $msg = [
                'css'=>'is_success',
                'txt'=>'Votre citation a été modifié'
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
header('Location: index.php?controller=citations');