<?php

function showLogin()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifie si les champs "email" et "password" existent dans le requête POST
        if (isset($_POST['email']) && isset($_POST['password'])) {
            // Vérifie si les champs ne sont pas vides
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                // Les données du formulaire sont valides, essayons de connecter l'utilisateur
                require "models/loginModel.php";
                login($_POST['email'], $_POST['password']);
            } else {
                // Les champs "email" et "password" sont vides, afficher un message d'erreur
                $error_message = "Veuillez remplir tous les champs du formulaire.";
            }
        } else {
            // Les champs "email" et "password" n'existent pas dans la requête POST, afficher un message d'erreur
            $error_message = "Données manquantes dans la requête POST.";
        }
    }

    require("templates/login.php");
}

function showRegister()
{
    if ($_POST && isset($_POST['email'])&& isset($_POST['nom'])&& isset($_POST['prenom']) && isset($_POST['password'])) {
        // Récupérez les données du formulaire
        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = $_POST['password'];

        // Vérifiez si l'utilisateur existe déjà 
        require "models/userModel.php";
        $existingUser = getUserByEmail($email);

        if ($existingUser) {
            // Affichez un message d'erreur si l'utilisateur existe déjà
            $error_message = "Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre.";
        } else {
            // L'utilisateur n'existe pas, vous pouvez créer un nouvel utilisateur
            require "models/registerModel.php";
            registerUser($email, $nom, $prenom, password_hash($password, PASSWORD_BCRYPT));

            // Redirigez vers la page de connexion ou toute autre page souhaitée
            header("Location: $base_url?page=login");
            exit();
        }
    }

    require("templates/register.php");
}