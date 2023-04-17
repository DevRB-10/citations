<?php

ob_start();

echo 'truc';
echo "\n".'machin';

?>

bidule a enregistrer

<?php

$content = ob_get_clean();

?>

<html>
    <?= $content ?>
</html>