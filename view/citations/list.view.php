<?php
$title = 'Les citations';
ob_start();
?>

<main>
    <h2>Liste des citations</h2>
    <section>
        <h3>Ajouter une citation</h3>
        <form action="index.php?controller=citations&action=add" method="post">
            <div class="fields">
                <div class="field">
                    <label for="citation">Citation</label>
                    <input type="text" name="citation" id="citation">
                </div>
                <div class="field">
                    <label for="auteur">Auteur</label>
                    <select name="auteur" id="auteur">
                        <option value="">Pas d'auteur</option>
                        <?php foreach($auteurs as $auteur) :?>
                            <option value="<?= $auteur['id'] ?>"><?= $auteur['auteur'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="field">
                    <label for="explication">Explication</label>
                    <textarea name="explication" id="explication"></textarea>
                </div>
            </div>

            <div class="submit">
                <input type="submit" value="Enregistrer">
            </div>
        </form>
    </section>
    <table>
        <tr>
            <th>Citation</th>
            <th>Auteur</th>
            <th>Date modif</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($citations as $citation): ?>
            <tr>
                <td><?= substr($citation['citation'],0,20) . '...'?></td>
                <td><?= $citation['auteur']?></td>
                <td><?= $citation['date_modif']?></td>
                <td><a href="index.php?controller=citations&action=update&id=<?= $citation['id']?>">Edit  <a href="index.php?controller=citations&action=delete&id=<?= $citation['id']?>">  Supp</td>
            </tr>
        <?php endforeach ?>
    </table>
</main>

<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';