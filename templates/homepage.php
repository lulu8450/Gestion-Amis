<?php
$titre = "Accueil";
global $base_url;
?>
<?php ob_start(); ?>

<?php 
$content = ob_get_clean();
require "layout.php";
?>