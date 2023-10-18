<?php
// Démarre la session PHP
session_start();
global $base_url;
$base_url = "http://gestion-amis/";
$GLOBALS['isConnected'] = $_SESSION && $_SESSION["user"];
// Variable globale pour savoir si l'utilisateur est connecté
require("models/db.php");
// Connexion à la base de données

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user']) && !in_array($_GET['page'], ['login', 'register'])) {
    header("Location: $base_url?page=login"); // Redirige vers la page de connexion
    exit();
}

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'login':
            require("controllers/authController.php");
            showLogin();
            break;
        case 'register':
            require("controllers/authController.php");
            showRegister();
            break;
        case 'logout':
            session_destroy(); // Détruit la session
            header("Location: $base_url?page=login"); // Redirige vers la page de connexion
            break;
        default:
            require("controllers/amisController.php");
            showAllAmisAccepter();
            break;
    }
}
?>
