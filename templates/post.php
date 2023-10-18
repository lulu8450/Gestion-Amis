<?php
$titre = "Create Post";
ob_start();
?>
<form method="POST">
    <input type="text" name="title" placeholder="title" required>
    <input type="text" name="content" placeholder="content" required>
    <input type="submit" value="Create Post">
</form>
<?php
$content = ob_get_clean();
require "layout.php";
?>