<?php

/**
 * supprime une citation par son id
 */

 if(isset($_GET['id'])){
    citations_delete($pdo, $_GET['id']);
    $msg = 
    [
    'css'=>'success',
    'txt'=>'La citation a bien été supprimé'
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
 header('Location: index.php');