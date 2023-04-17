<?php
$title = 'Les utilisateurs';
ob_start();
?>

<?php if($_SESSION['profil']['is_admin']) : ?>
<main>
    <h2>Liste des utilisateurs</h2>

    <section>
        <h3>Ajouter un utilisateur</h3>
        <form action="index.php?controller=utilisateurs&action=add" method="post">
            <div class="fields">
                <div class="field">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom">
                </div>
                <div class="field">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom">
                </div>
                <div class="field">
                    <label for="email">Mail</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="field">
                    <label for="admin">Admin</label>
                    <input type="number" name="admin" id="admin">
                </div>
            </div>

            <div class="submit">
                <input type="submit" value="Enregistrer">
            </div>
        </form>
    </section>

    <table>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Mail</th>
            <th>Admin</th>
            <th>Date modif</th>
            <th>Id</th>
            <th>Actions</th>
        </tr>
        <?php foreach($utilisateurs as $utilisateur) :?>
            <tr>
                <td><?= $utilisateur['prenom'] ?></td>
                <td><?= $utilisateur['nom'] ?></td>
                <td><?= $utilisateur['mail'] ?></td>
                <td><?= $utilisateur['is_admin'] ? 'oui' : 'non' ?></td>
                <td><?= $utilisateur['date_modif'] ?></td>
                <td><?= $utilisateur['id'] ?></td>
                <td><a href="index.php?controller=utilisateurs&action=update&id=<?= $utilisateur['id']?>">Edit  <a href="index.php?controller=utilisateurs&action=delete&id=<?= $utilisateur['id']?>">  Supp</td>
            </tr>
        <?php endforeach ?>
    </table>
</main>
<?php endif ?>

<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';