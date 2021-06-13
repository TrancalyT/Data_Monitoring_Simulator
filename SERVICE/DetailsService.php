<?php

include_once(__DIR__ . "/../DAO/DetailsDAO.php");
include_once(__DIR__ . "/../EXCEPTIONS/DetailsServiceException.php");

class DetailsService 
{
    // INSERTION DES DONNES ALEATOIRES
    public function insertDetails($details, $id)
    {
        $detailsDAO = new DetailsDAO();

        try {
            $detailsService = $detailsDAO->insertDetails($details, $id);
        } catch (ModuleDAOException $error){
            throw new ModuleServiceException($error->getMessage());
        }
        return $detailsService;
    }

    // INSERTION DONNEES NEUTRE LORS D'UNE CREATION DE MODULE
    public function insertNewDetails($id)
    {
        $detailsDAO = new DetailsDAO();

        try {
            $detailsService = $detailsDAO->insertNewDetails($id);
        } catch (ModuleDAOException $error){
            throw new ModuleServiceException($error->getMessage());
        }
        return $detailsService;
    }

    // SELECTION DE LA DERNIERE DUREE ACTIVATION
    public function selectLastActivation($id)
    {
        $detailsDAO = new DetailsDAO();

        try {
            $detailsService = $detailsDAO->selectLastActivation($id);
        } catch (ModuleDAOException $error){
            throw new ModuleServiceException($error->getMessage());
        }
        return $detailsService;
    }

}

?>