<?php

/**
 * instancie un objet PDO, pilote de la BDD
 */

 $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

 try {
    //$pdo = new PDO('mysql:host:https://h2-phpmyadmin.infomaniak.com/?pma_servername=n16sp.myd.infomaniak.com;dbname=n16sp_renaud','n16sp_renaud','Me39V72T100Ma152');
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (Exception $e) {
    echo 'Erreur PDO: ' . $e->getMessage();
    die();
 }