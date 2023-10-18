<?php
$titre = "Register";
ob_start();
?>
<form method="POST">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="nom" placeholder="Nom">
    <input type="text" name="prenom" placeholder="Prenom">
    <input type="password" name="password" placeholder="Mot de Passe">
    <input type="submit" value="Register">
</form>
<?php
$content = ob_get_clean();
require "layout.php";
?>