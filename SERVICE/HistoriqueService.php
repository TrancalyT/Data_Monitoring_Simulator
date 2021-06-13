<?php

include_once(__DIR__ . "/../DAO/HistoriqueDAO.php");
include_once(__DIR__ . "/../EXCEPTIONS/HistoriqueServiceException.php");

class HistoriqueService
{
    // AFFICHAGE HISTORIQUE D'UN MODULE
    public function displayHistoricForModule($idModule)
    {
        $histDAO = new HistoriqueDAO();

        try {
            $histService = $histDAO->displayHistoricForModule($idModule);
        } catch (HistoriqueDAOException $error) {
            throw new HistoriqueServiceException($error->getMessage());
        }

        return $histService;
    }

    // AFFICHAGE HISTORIQUE D'UN MODULE MAX10
    public function displayHistoricForModuleMax10($id)
    {
        $histDAO = new HistoriqueDAO();

        try {
            $histService = $histDAO->displayHistoricForModuleMax10($id);
        } catch (HistoriqueDAOException $error) {
            throw new HistoriqueServiceException($error->getMessage());
        }

        return $histService;
    }

    // MOYENNE TEMPERATURE
    public function averageTemp($id)
    {
        $histDAO = new HistoriqueDAO();

        try {
            $histService = $histDAO->averageTemp($id);
        } catch (HistoriqueDAOException $error) {
            throw new HistoriqueServiceException($error->getMessage());
        }

        return $histService;
    }

    // MOYENNE VITESSE
    public function averageSpeed($id)
    {
        $histDAO = new HistoriqueDAO();

        try {
            $histService = $histDAO->averageSpeed($id);
        } catch (HistoriqueDAOException $error) {
            throw new HistoriqueServiceException($error->getMessage());
        }

        return $histService;
    }

    // MOYENNE FLUX
    public function averageFlux($id)
    {
        $histDAO = new HistoriqueDAO();

        try {
            $histService = $histDAO->averageFlux($id);
        } catch (HistoriqueDAOException $error) {
            throw new HistoriqueServiceException($error->getMessage());
        }

        return $histService;
    }

    // MOYENNE ENERGIE
    public function averageEnergy($id)
    {
        $histDAO = new HistoriqueDAO();

        try {
            $histService = $histDAO->averageEnergy($id);
        } catch (HistoriqueDAOException $error) {
            throw new HistoriqueServiceException($error->getMessage());
        }

        return $histService;
    }

    // SELECTION DU NOMBRE DE PANNES ENREGISTREES
    public function amountBreakdown($id)
    {
        $histDAO = new HistoriqueDAO();

        try {
            $histService = $histDAO->amountBreakdown($id);
        } catch (HistoriqueDAOException $error) {
            throw new HistoriqueServiceException($error->getMessage());
        }

        return $histService;
    }

    // RECUPERATION DES 15 DERNIERES ENTREES TEMPERATURES
    public function lastTemp15($id)
    {
        $histDAO = new HistoriqueDAO();

        try {
            $histService = $histDAO->lastTemp15($id);
        } catch (HistoriqueDAOException $error) {
            throw new HistoriqueServiceException($error->getMessage());
        }

        return $histService;
    }

    // RECUPERATION DES 15 DERNIERES ENTREES VITESSES
    public function lastSpeed15($id)
    {
        $histDAO = new HistoriqueDAO();

        try {
            $histService = $histDAO->lastSpeed15($id);
        } catch (HistoriqueDAOException $error) {
            throw new HistoriqueServiceException($error->getMessage());
        }

        return $histService;
    }

    // RECUPERATION DES 15 DERNIERES ENTREES FLUX
    public function lastFlux15($id)
    {
        $histDAO = new HistoriqueDAO();

        try {
            $histService = $histDAO->lastFlux15($id);
        } catch (HistoriqueDAOException $error) {
            throw new HistoriqueServiceException($error->getMessage());
        }

        return $histService;
    }

    // RECUPERATION DES 15 DERNIERES ENTREES ENERGIES
    public function lastEnergy15($id)
    {
        $histDAO = new HistoriqueDAO();

        try {
            $histService = $histDAO->lastEnergy15($id);
        } catch (HistoriqueDAOException $error) {
            throw new HistoriqueServiceException($error->getMessage());
        }

        return $histService;
    }

    // RECUPERATION DES 5 DERNIERES ENTREES PANNES
    public function lastBreakdown5($id)
    {
        $histDAO = new HistoriqueDAO();

        try {
            $histService = $histDAO->lastBreakdown5($id);
        } catch (HistoriqueDAOException $error) {
            throw new HistoriqueServiceException($error->getMessage());
        }

        return $histService;
    }
}
