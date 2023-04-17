<?php

$title = "Mot de passe oublié";

$content = ob_start();

?>

<h2>Mot de passe oublié</h2>
<form action="index.php?controller=utilisateurs&action=forgot_password" method="post" id="form1">
    <div class="field">
        <label for="mail">Mail</label>
        <input type="email" name="mail" id="mail" required>
    </div>
    <div class="submit">
        <input type="submit" value="Valider">
    </div>
</form>


<?php

$content = ob_get_clean();
require '../template/connexion.php';