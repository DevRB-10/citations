<?php
$title = 'Les citations';
ob_start();
?>

<main>
    <h2>Modifier des citations</h2>
    <section>
        <h3>Modifier une citation</h3>
        <form action="index.php?controller=citations&action=update_citations&id=<?= $cit['id']?>" method="post">
            <div class="fields">
                <div class="field">
                    <label for="citation">Citation</label>
                    <input type="text" name="citation" id="citation" value="<?= $cit['citation'] ?>">
                </div>
                <div class="field">
                    <label for="auteur">Auteur</label>
                    <select name="auteur" id="auteur">
                        <option value="<?= $aut['id'] ?>"><?= $aut['auteur'] ?></option>
                        <!-- <option value="<?php /* if($auteur['id'] != NULL) {echo $auteur['auteur'];}  else {echo "Pas d'auteur";} */ ?>">
                            <?php /* if($a_auth == 1) {echo $auteur['auteur'];}  else {echo "Pas d'auteur";}  */?>
                        </option> -->
                        <?php foreach($auteurs as $auteur) :?>
                            <option value="<?= $auteur['id'] ?>"><?= $auteur['auteur'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="field">
                    <label for="explication">Explication</label>
                    <textarea name="explication" id="explication"><?= $cit['explication'] ?></textarea>
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