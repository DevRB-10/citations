<?php
require ROOT . '/model/auteurs.model.php';
/**
 * controller action list
 */

 $citations = citations_fetchAll($pdo);
 $auteurs = auteurs_fetchAll($pdo);

require ROOT . '/view/citations/list.view.php';