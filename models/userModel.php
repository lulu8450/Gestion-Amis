<?php

// function getUserByEmail($email)
// {
//     global $pdo;
//     $query = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :e");
//     $query->execute(["e" => $email]);
//     $user = $query->fetch(); 
//     return $user;
// }
function getUserByEmail($email)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :e");
    $query->execute(["e" => $email]);
    $user = $query->fetch();
    return $user;
}