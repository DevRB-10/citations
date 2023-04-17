<?php

/**
 * Entree de l'appli
 * Appelle le fichie rde conf
 * route vers le bon controlleur
 */

/*  echo '<pre>';
 print_r($_GET);
 echo '</pre>'; */
session_start();

require '../inc/conf.php';

if(isset($_GET['controller'])){
    switch ($_GET['controller']) {
        case 'citations':
        case 'profil':
        case 'auteurs':
        case 'utilisateurs':
            $controller = $_GET['controller'];
            break;
        default:
            $controller = '404';
            break;
    }
}
else{
    $controller = 'citations';
}

if(!isset($_SESSION['profil'])){
    $controller = 'profil';
}

require_once ROOT . '/controller/' . $controller . '/index.php';