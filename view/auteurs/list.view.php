<?php
$title = 'Les auteurs';
ob_start();
?>

<main>
    <h2>Liste des auteurs</h2>

    <section>
        <h3>Ajouter un auteur</h3>
        <form action="index.php?controller=auteurs&action=add" method="post">
            <div class="fields">
                <div class="field">
                    <label for="auteur">Auteur</label>
                    <input type="text" name="auteur" id="auteur">
                </div>
                <div class="field">
                    <label for="bio">Biographie</label>
                    <textarea name="bio" id="bio"></textarea>
                </div>
            </div>

            <div class="submit">
                <input type="submit" value="Enregistrer">
            </div>
        </form>
    </section>

    <table>
        <tr>
            <th>Auteur</th>
            <th>Biographie</th>
            <th>Date modif</th>
            <th>Actions</th>
        </tr>
        <?php foreach($auteurs as $auteur) :?>
            <tr>
                <td><?= $auteur['auteur'] ?></td>
                <td><?= substr($auteur['bio'],0,150) . '...' ?></td>
                <td><?= $auteur['date_modif'] ?></td>
                <td><a href="index.php?controller=auteurs&action=update&id=<?= $auteur['id']?>">Edit  <a href="index.php?controller=auteurs&action=delete&id=<?= $auteur['id']?>">  Supp</td>
            </tr>
        <?php endforeach ?>
    </table>
</main>

<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';