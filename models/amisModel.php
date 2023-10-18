<?php
function demandeAmis($expediteur, $destinataire, $statut)
{
    global $pdo;
    $query = $pdo->prepare("INSERT INTO amis (ID_Utilisateur_Expediteur, ID_Utilisateur_Destinataire, Statut) VALUES (:e, :d, :s)");
    $query->execute([
        "e" => $expediteur,
        "d" => $destinataire,
        "s" => $statut
    ]);
    return true;
}

function getAmis()
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM amis");
    $query->execute();
    $posts = $query->fetchAll();
    return $posts;
}

function getAmisAcceptes($ID_Utilisateur_Expediteur, $statut )
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM amis where ID_Utilisateur_Expediteur =: e and statut =: statut");
    $query->execute();
    $amiaccepter = $query->fetchAll();
    return $amiaccepter;
}

function getAmisAttentes($ID_Utilisateur_Expediteur, $statut)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM amis where ID_Utilisateur_Expediteur =: e and statut =: statut");
    $query->execute();
    $amiaccepter = $query->fetchAll();
    return $amiaccepter;
}
