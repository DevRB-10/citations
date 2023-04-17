<?php

/**
 * supprime un auteur par son id
 */

 if(isset($_GET['id'])){
    auteurs_delete($pdo, $_GET['id']);
    $msg = 
    [
    'css'=>'success',
    'txt'=>'L\'auteur a bien été supprimé'
    ];
 }
 else{
    $msg = 
    [
    'css'=>'is-warning',
    'txt'=>'Action impossible'
    ];
 }

 $_SESSION['msg'] = $msg;
 header('Location: index.php?controller=auteurs&action=list');