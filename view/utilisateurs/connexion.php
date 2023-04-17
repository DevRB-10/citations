<?php

$title = "Connexion";

$content = ob_start();

?>

<h2>Se connecter</h2>
<form action="index.php?controller=profil" method="post" id="form1">
    <div class="field">
        <label for="mail">Mail</label>
        <input type="email" name="mail" id="mail" required>
    </div>
    <div class="field">
        <label for="mot_de_passe">Mot de passe</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" require>
    </div>
    <div>
        <a href="../view/utilisateurs/forgot_password.view.php">Mot de passe oublié</a>
    </div>
    <div class="submit">
        <input type="submit" value="Se connecter">
    </div>
</form>


<?php

$content = ob_get_clean();
require ROOT . '/view/template/connexion.php';