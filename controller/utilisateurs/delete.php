<?php

/**
 * supprime un auteur par son id
 */

 if(isset($_GET['id'])){
    utilisateurs_delete($pdo, $_GET['id']);
    $msg = 
    [
    'css'=>'success',
    'txt'=>'L\'utilisateur a bien été supprimé'
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
 header('Location: index.php?controller=utilisateurs&action=list');