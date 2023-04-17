<?php
$title = 'Les auteurs';
ob_start();
?>

<main>
    <h2>Modifier des auteurs</h2>
    <section>
        <h3>Modifier un auteur</h3>
        <form action="index.php?controller=auteurs&action=update_auteurs&id=<?= $aut['id']?>" method="post">
            <div class="fields">
                <div class="field">
                    <label for="auteur">Auteur</label>
                    <input type="text" name="auteur" id="auteur" value="<?= $aut['auteur'] ?>">
                </div>
                <div class="field">
                    <label for="bio">Biographie</label>
                    <textarea name="bio" id="bio"><?= $aut['bio'] ?></textarea>
                </div>
            </div>

            <div class="submit">
                <input type="submit" value="Enregistrer">
            </div>
        </form>
    </section>
</main>

<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';