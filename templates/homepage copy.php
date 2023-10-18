<?php
$titre = "Accueil";
global $base_url;
?>
<?php ob_start(); ?>
<?php for ($i = 0; $i < sizeof($posts); $i++) { ?>
    <div class="card">
        <h3><?= $posts[$i]['title'] ?></h3>
        <p><?= $posts[$i]['content'] ?></p>
        <a href="<?= $base_url ?>?page=show&id=<?= $posts[$i]['id'] ?>">Lire la suite</a>
    </div> 
<?php }
$content = ob_get_clean();
require "layout.php";
?>