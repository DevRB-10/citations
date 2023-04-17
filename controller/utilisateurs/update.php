<?php

/**
 * controller action list
 */

$util = utilisateurs_fetchByID($pdo, $_GET['id']);
$utilisateurs = utilisateurs_fetchAlllist($pdo);

require ROOT . '/view/utilisateurs/update.view.php';
