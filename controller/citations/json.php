<?php
require ROOT . '/model/auteurs.model.php';

$citations = citations_fetchAll($pdo);
$auteurs = auteurs_fetchAll($pdo);

$data = [];
$data['date'] = date('c');
$data['citations'] = $citations;
$data['auteurs'] = $auteurs;

header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);