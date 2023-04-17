<?php

require __DIR__ . '/pdo.php';

function get_password(PDO $pdo, string $mail){
    $sql = 'SELECT mot_de_passe FROM utilisateurs WHERE mail = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$mail]);
    return $q->fetchColumn();
}

function fetchAllByMail(PDO $pdo, string $mail){
    $sql = 'SELECT id, prenom, nom, mail, is_admin FROM utilisateurs WHERE mail = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$mail]);
    return $q->fetch(PDO::FETCH_ASSOC);
}

function utilisateurs_fetchAlllist(PDO $pdo){
    $sql = 'SELECT * FROM utilisateurs';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * trouve un utilisateur avec son id
 *
 * @param PDO $pdo
 * @param integer $id
 * @return void
 */
function utilisateurs_fetchById(PDO $pdo, int $id){
    $sql = 'SELECT * FROM utilisateurs WHERE utilisateurs.id = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$id]);
    return $q->fetch(PDO::FETCH_ASSOC);
 }

 /**
  * ajoute un utilisateur
  *
  * @param PDO $pdo
  * @param string $prenom
  * @param string $nom
  * @param string $mail
  * @param integer $is_admin
  * @return void
  */
function utilisateurs_add(PDO $pdo, string $prenom, string $nom, string $mail, int $is_admin){
    $sql = 'INSERT INTO utilisateurs(utilisateurs.prenom, utilisateurs.nom, utilisateurs.mail, utilisateur.is_admin)
    VALUES(:prenom, :nom, :mail, :is_admin)';
    $q = $pdo->prepare($sql);
    $q->bindValue(':prenom', $prenom);
    $q->bindValue(':nom', $nom);
    $q->bindValue(':mail', $mail);
    $q->bindValue(':is_admin', $is_admin);
    return $q->execute();
}

/**
 * supprime un utilisateur avec l'id
 *
 * @param PDO $pdo
 * @param integer $id
 * @return void
 */
function utilisateurs_delete(PDO $pdo, int $id){
    $sql = 'DELETE FROM utilisateurs WHERE id = ?';
    $q = $pdo->prepare($sql);
    return $q->execute([$id]);
 }

 /**
  * mise a jour d'un utilisateur
  *
  * @param PDO $pdo
  * @param array $data
  * @param integer $id
  * @return void
  */
 function utilisateurs_update(PDO $pdo, array $data, int $id){
    $sql = 'UPDATE utilisateurs SET ';
    foreach($data as $key=>$value){
       $sql .= $key . ' = \'' . $value . '\', ';
    }
    $sql = substr($sql, 0, -2);
    $sql .=' WHERE id = ' . $id;
    echo $sql;
    $q = $pdo->prepare($sql);
    return $q->execute();
 }