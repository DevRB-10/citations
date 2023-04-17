<?php

/* 
 * Composants d'accès aux données de la table citations
 */
require_once __DIR__ . '/pdo.php';

 /**
  * retourne toutes les infos de toutes les citaions
  *
  * @param PDO $pdo
  * @return void
  */
function citations_fetchAll(PDO $pdo){
   $sql = 'SELECT citations.id, citations.citation, citations.explication, DATE_FORMAT(citations.date_modif, "%d-%m-%Y") as date_modif, auteurs.auteur FROM citations LEFT JOIN auteurs ON auteurs.id = citations.auteurs_id';
   $q = $pdo->query($sql);
   return $q->fetchAll(PDO::FETCH_ASSOC);
} 
/**
 * retourne un enregistrement sélectionner par son id
 *
 * @param PDO $pdo
 * @param int $id
 * @return array | false
 */
function citations_fetchById(PDO $pdo, int $id){
   $sql = 'SELECT * FROM citations WHERE citations.id = ?';
   $q = $pdo->prepare($sql);
   $q->execute([$id]);
   return $q->fetch(PDO::FETCH_ASSOC);
}

/**
 * Ajoute une citation
 *
 * @param PDO $pdo
 * @param string $citation
 * @param string|null $explication
 * @param integer|null $auteurs_id
 * @return void
 */
function citations_add(PDO $pdo, string $citation, string $explication = null, int $auteurs_id = null){
   $sql = 'INSERT INTO citations(citations.citation, citations.explication, citations.auteurs_id)
   VALUES(:citation, :explication, :auteurs_id)';
   $q = $pdo->prepare($sql);
   $q->bindValue(':citation', $citation);
   $q->bindValue(':explication', $explication);
   $q->bindValue(':auteurs_id', $auteurs_id);
   return $q->execute();
}

function citations_update(PDO $pdo, array $data, int $id){
   $sql = 'UPDATE citations SET ';
   foreach($data as $key=>$value){
      $sql .= $key . ' = \'' . $value . '\', ';
   }
   $sql = substr($sql, 0, -2);
   $sql .=' WHERE id = ' . $id;
   echo $sql;
   $q = $pdo->prepare($sql);
   return $q->execute();
}

// UPDATE `citations` SET `citation` = 'plouf plouf', `explication` = 'nos ames sont tordu pour pecher', `auteurs_id` = '7' WHERE `citations`.`id` = 3;

/**
 * 
 * Supprime un tuple
 *
 * @param PDO $pdo
 * @param integer $id
 * @return void
 */
function citations_delete(PDO $pdo, int $id){
   $sql = 'DELETE FROM citations WHERE id = ?';
   $q = $pdo->prepare($sql);
   return $q->execute([$id]);
}




//var_dump(fetchAll($pdo));
//var_dump(fetchById($pdo, 1));
//var_dump(add($pdo, 'ma citation'));
//var_dump(delete($pdo, 1));

//var_dump(update($pdo, ['id'=>3, 'citation'=>'plouf plouf', 'explication'=>'nos ames sont tordu pour pecher', 'auteurs_id'=>3]));