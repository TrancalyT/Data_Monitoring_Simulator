<?php

include_once(__DIR__ . "/../SERVICE/ModuleService.php");
include_once(__DIR__ . "/../SERVICE/DetailsService.php");
session_start();

if (isset($_POST)) {

    $name = $_POST['name'];

    if (isset($name) && !empty($name)) {

        try {
            $doublonModule = (new ModuleService())->ifAlreadyExist($name);

            if ((!$doublonModule)) {

                try {
                    // AJOUT DU MODULE
                    $addModule = new ModuleService();
                    $addModule->addModule($name);
                    // RECUPERATION DE SON ID
                    $lastId = $addModule->selectLastId();
                    // INITIALISATION DE DONNEES NEUTRE SUR LE NOUVEAU MODULE
                    try {
                        $detailsService = new DetailsService();
                        $detailsService->insertNewDetails($lastId);
    
                    } catch (DetailsServiceException $error) {
                        $message = $error->getMessage();
                        header("Location: ../index.php?info=$message");
                    }
                    
                    $_SESSION['id'] = $lastId;
                    $_SESSION['name'] = $name;
                    $message = "Module inscrit avec succès !";
                    header("Location: ../index.php?info=$message");
                } catch (ModuleServiceException $error) {
                    $message = $error->getMessage();
                    header("Location: ../index.php?info=$message");
                }
            } else {
                $message =  "Erreur : Ce module existe déjà, veuillez en ajouter un nouveau.";
                header("Location: ../index.php?info=$message");
            }

        } catch (ModuleServiceException $error) {
            $message = $error->getMessage();
            header("Location: ../index.php?info=$message");
        }
    } else {
        $message =  "Erreur : Veuillez saisir et remplir les informations manquantes.";
        header("Location: ../index.php?info=$message");
    }
} else {

    $message =  "Erreur : Vous ne pouvez accéder à cette page.";
    header("Location: ../index.php?info=$message");
}
