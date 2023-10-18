<?php

function showDemandeAmis()
{
    // Afficher tous les utilisateur qui ne sont pas encore amis
    require_once "models/amisModel.php";
    $demandesAmis = 
    require "templates/homepage.php";
}

function showAllAmisAccepter()
{
    // Afficher tous les amis qui ont accepter la demande
    require_once "models/amisModel.php";
    $amisAcceptes = getAmisAcceptes($ID_Utilisateur_Expediteur, $statut);
    require "templates/homepage.php";
}

function showAllAmisAttentes()
{
    // Afficher tous les amis sont en attente
    require_once "models/amisModel.php";
    $amisAttentes = getAmisAttentes($ID_Utilisateur_Expediteur, $statut);
    require "templates/homepage.php";
}