<?php
$titre = "Login";
ob_start();
?>
<form method="POST">
    <input type="text" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <input type="submit" value="Login">
</form>
<?php
$content = ob_get_clean();
require "layout.php";
?>