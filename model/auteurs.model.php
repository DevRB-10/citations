<?php

require __DIR__ . '/pdo.php';

/**
 * retourne tout des auteurs
 *
 * @param PDO $pdo
 * @return void
 */
function auteurs_fetchAll(PDO $pdo){
    $sql = 'SELECT * FROM auteurs';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * selectionne un auteur par rapport a son id
 *
 * @param PDO $pdo
 * @param integer $id
 * @return void
 */
function auteurs_fetchById(PDO $pdo, int $id){
    $sql = 'SELECT * FROM auteurs WHERE auteurs.id = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$id]);
    return $q->fetch(PDO::FETCH_ASSOC);
 }

/**
 * ajoute un auteur
 *
 * @param PDO $pdo
 * @param string $auteur
 * @param string $bio
 * @return void
 */
function auteurs_add(PDO $pdo, string $auteur, string $bio){
    $sql = 'INSERT INTO auteurs(auteurs.auteur, auteurs.bio)
    VALUES(:auteur, :bio)';
    $q = $pdo->prepare($sql);
    $q->bindValue(':auteur', $auteur);
    $q->bindValue(':bio', $bio);
    return $q->execute();
 }

/**
 * supprime un auteur avec l'id
 *
 * @param PDO $pdo
 * @param integer $id
 * @return void
 */
 function auteurs_delete(PDO $pdo, int $id){
    $sql = 'DELETE FROM auteurs WHERE id = ?';
    $q = $pdo->prepare($sql);
    return $q->execute([$id]);
 }

 function auteurs_update(PDO $pdo, array $data, int $id){
    $sql = 'UPDATE auteurs SET ';
    foreach($data as $key=>$value){
       $sql .= $key . " = \"" . $value . "\", ";
    }
    $sql = substr($sql, 0, -2);
    $sql .=" WHERE id = " . $id;
    echo $sql;
    $q = $pdo->prepare($sql);
    return $q->execute();
 }

 // UPDATE auteurs SET auteur = 'Sénèque', bio = 'Fénèque (en latin Lucius Annaeus Seneca), né à Cordoue, dans le sud de l'Espagne, entre l'an 4 av. J.-C. et l'an 1 apr. J.-C., mort le 12 avril 65 apr. J.-C., est un philosophe de l'école stoïcienne, un dramaturge et un homme d'État romain du Ier siècle. Il est parfois nommé Sénèque le Philosophe, Sénèque le Tragique ou Sénèque le Jeune pour le distinguer de son père, Sénèque l'Ancien. Conseiller à la cour impériale sous Caligula, exilé à l'avènement de Claude puis rappelé comme précepteur de Néron, Sénèque joue un rôle important de conseiller auprès de ce dernier avant d'être discrédité et acculé au suicide. Ses traités philosophiques comme De la colère, De la vie heureuse ou De la brièveté de la vie, et surtout ses Lettres à Lucilius exposent ses conceptions philosophiques stoïciennes. ' WHERE id = 1
 // UPDATE `auteurs` SET `auteur` = 'Sénèques', `bio` = 'Fénèque (en latin Lucius Annaeus Seneca), né à Cordoue, dans le sud de l\'Espagne, entre l\'an 4 av. J.-C. et l\'an 1 apr. J.-C., mort le 12 avril 65 apr. J.-C., est un philosophe de l\'école stoïcienne, un dramaturge et un homme d\'État romain du Ier siècle. Il est parfois nommé Sénèque le Philosophe, Sénèque le Tragique ou Sénèque le Jeune pour le distinguer de son père, Sénèque l\'Ancien.\r\n\r\nConseiller à la cour impériale sous Caligula, exilé à l\'avènement de Claude puis rappelé comme précepteur de Néron, Sénèque joue un rôle important de conseiller auprès de ce dernier avant d\'être discrédité et acculé au suicide. Ses traités philosophiques comme De la colère, De la vie heureuse ou De la brièveté de la vie, et surtout ses Lettres à Lucilius exposent ses conceptions philosophiques stoïciennes. ' WHERE `auteurs`.`id` = 1;