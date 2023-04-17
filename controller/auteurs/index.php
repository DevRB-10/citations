<?php

/**
 * 
 */

require_once ROOT . '/model/auteurs.model.php' ;

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'add':
        case 'delete':
        case 'json':
        case 'list':
        case 'update':
        case 'update_auteurs':
            $action = $_GET['action'];
            break;
        default:
            require_once ROOT . '/controller/404/index.php'; 
    }
}
else{
    $action = 'list';
}

require_once __DIR__ . '/' . $action . '.php';