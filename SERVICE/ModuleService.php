<?php

include_once(__DIR__ . "/../DAO/ModuleDAO.php");
include_once(__DIR__ . "/../EXCEPTIONS/ModuleServiceException.php");

class ModuleService 
{

    // AFFICHAGE DES MODULES
    public function displayAllModules()
    {
        $moduleDAO = new ModuleDAO();

        try {
            $moduleService = $moduleDAO->displayAllModules();
        } catch (ModuleDAOException $error){
            throw new ModuleServiceException($error->getMessage());
        }
        return $moduleService;
    }

    // CHECK SI NOM DU MODULE EXISTE
    public function ifAlreadyExist($nom)
    {
        $moduleDAO = new ModuleDAO();

        try {
            $moduleService = $moduleDAO->ifAlreadyExist($nom);
        } catch (ModuleDAOException $error){
            throw new ModuleServiceException($error->getMessage());
        }
        return $moduleService;
    }

    // AJOUT D'UN NOUVEAU MODULE
    public function addModule($nom)
    {
        $moduleDAO = new ModuleDAO();

        try {
            $moduleDAO->addModule($nom);
        } catch (ModuleDAOException $error){
            throw new ModuleServiceException($error->getMessage());
        }
    }

    // RECHERCHE DU DERNIER ID
    public function selectLastId()
    {
        $moduleDAO = new ModuleDAO();

        try {
            $moduleService = $moduleDAO->selectLastId();
        } catch (ModuleDAOException $error){
            throw new ModuleServiceException($error->getMessage());
        }

        return $moduleService;
    }

}
