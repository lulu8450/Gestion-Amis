<?php
global $pdo;
if (isset($pdo)) {
    return;
}
$pdo = new PDO("mysql:host=localhost;dbname=gestion_amis;charset=utf8", "root", "");
