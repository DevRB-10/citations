<?php
             
/**
 * controller action list
 */

$auteurs = auteurs_fetchAll($pdo);

require ROOT . '/view/auteurs/list.view.php';