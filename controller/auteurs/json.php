<?php

$auteurs = auteurs_fetchAll($pdo);

$data = [];
$data['date'] = date('c');
$data['auteurs'] = $auteurs;

header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);