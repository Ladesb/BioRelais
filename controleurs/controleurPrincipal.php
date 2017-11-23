<?php

require_once '../fonctions/menu.php';
require_once '../fonctions/formulaire.php';
require_once '../fonctions/dispatcher.php';
require_once '../modeles/dao/dao.php';
require_once '../fonctions/fonctions.php';

if (isset($_GET['bioRelaisMP'])){
    $_SESSION['bioRelaisMP']= $_GET['bioRelaisMP'];
}


$bioRelaisMP = new Menu("menuPrincipal");


$bioRelaisMP->ajouterComposant($bioRelaisMP->creerItemLien("accueil", "Accueil"));

if (isset($_SESSION['identification'])){
    $bioRelaisMP->ajouterComposant($bioRelaisMP->creerItemLien("emprunt", "Emprunter un vélo"));
    $bioRelaisMP->ajouterComposant($bioRelaisMP->creerItemLien("MonCompte", "Mon compte"));
    $bioRelaisMP->ajouterComposant($bioRelaisMP->creerItemLien("deconnexion", "Se deconnecter"));
}
else {
    $bioRelaisMP->ajouterComposant($bioRelaisMP->creerItemLien("connexion", "Se connecter"));
}

$menuPrincipal = $bioRelaisMP->creerMenu($_SESSION['bioRelaisMP'],'bioRelaisMP');

include_once dispatcher::dispatch($_SESSION['bioRelaisMP']);