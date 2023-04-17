<?php

if(isset($_POST['citation'], $_POST['auteur'], $_POST['explication'])){
    if(!empty($_POST['citation'])){
        $auteurs_id = empty($_POST['auteur']) ? NULL : $_POST['auteur'];
        $explication = empty($_POST['explication']) ? NULL : $_POST['explication'];

        if(citations_add($pdo, $_POST['citation'], $explication, $auteurs_id)){
            $msg = [
                'css'=>'is_success',
                'txt'=>'Votre citation ajouté'
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
header('Location: index.php');