<?php

function login($email, $password)
{
    global $pdo;

    // Vérifie si les paramètres ne sont pas nuls
    if ($email !== null && $password !== null) {
        $query = $pdo->prepare("SELECT * FROM utilisateurs  WHERE  email  = :e");
        $query->execute(["e" => $email]);

        // Vérifie si la requête a réussi
        if ($query->rowCount() > 0) {
            $user = $query->fetch();

            // Vérifie si la clé "password" existe dans le tableau $user et que le mot de passe n'est pas nul
            if (isset($user["password"]) && $user["password"] !== null && password_verify($password, $user["password"])) {
                header("Location: index.php?");
                exit(); // Assurez-vous de terminer l'exécution du script après la redirection
            }
        }
    }
}

// function login($email, $password)
// {
//     global $pdo;

//     // Vérifie si les paramètres ne sont pas nuls
//     if ($email !== null && $password !== null) {
//         $query = $pdo->prepare("SELECT * FROM utilisateurs  WHERE  email  = :e");
//         $query->execute(["e" => $email]);
//         $user = $query->fetch();

//         if ($user && password_verify($password, $user["password"])) {
//             return true;
//         }
//     }

//     return false;
// }