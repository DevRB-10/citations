<?php
$title = 'Les utilisateurs';
ob_start();
?>

<?php if($_SESSION['profil']['is_admin']) : ?>
<main>
    <h2>Modifier des utilisateurs</h2>
    <section>
        <h3>Modifier un utilisateur</h3>
        <form action="index.php?controller=utilisateurs&action=update_utilisateurs&id=<?= $util['id']?>" method="post">
            <div class="fields">
                <div class="field">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" value="<?= $util['prenom'] ?>">
                </div>
                <div class="field">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" value="<?= $util['nom'] ?>">
                </div>
                <div class="field">
                    <label for="mail">Mail</label>
                    <input type="mail" name="mail" id="mail" value="<?= $util['mail'] ?>">
                </div>
                <div class="field">
                    <label for="is_admin">Admin</label>
                    <input type="text" name="is_admin" id="is_admin" value="<?= $util['is_admin'] ? 'oui' : 'non' ?>">
                </div>
                <div class="field">
                    <label for="id">Id</label>
                    <input type="text" name="id" id="id" value="<?= $util['id'] ?>">
                </div>
            </div>

            <div class="submit">
                <input type="submit" value="Enregistrer">
            </div>
        </form>
    </section>
</main>
<?php endif ?>

<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';