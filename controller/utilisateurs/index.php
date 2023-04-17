<?php

/**
 * 
 */

require_once ROOT . '/model/utilisateurs.model.php' ;

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'list':
        case 'delete':
        case 'add':
        case 'update':
        case 'update_utilisateurs':
        case 'json': 
        case 'forgot_password':
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