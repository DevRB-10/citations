<?php

/**
 * controller action list
 */
 $aut = auteurs_fetchById($pdo, $_GET['id']);
 $auteurs = auteurs_fetchAll($pdo);
 
require ROOT . '/view/auteurs/update.view.php';
