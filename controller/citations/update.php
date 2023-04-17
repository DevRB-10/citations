<?php

require ROOT . '/model/auteurs.model.php';
/**
 * controller action list
 */
 $cit = citations_fetchById($pdo, $_GET['id']);
 if($cit['auteurs_id'] != NULL){
    $a_auth = 1;
    $aut = auteurs_fetchById($pdo, $cit['auteurs_id']);
 }
 $auteurs = auteurs_fetchAll($pdo);
 
require ROOT . '/view/citations/update.view.php';
