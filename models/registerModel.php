<?php

function registerUser($email, $nom, $prenom, $password)
{
    global $pdo;
        $query = $pdo->prepare("INSERT INTO utilisateurs (email, nom, prenom, password) VALUES (:e, :n, :p, :m)");
        $query->execute([
            "e" => $email,
            "n" => $nom,
            "p" => $prenom,
            "m" => password_hash($password, PASSWORD_DEFAULT),
        ]);
        return true;
}