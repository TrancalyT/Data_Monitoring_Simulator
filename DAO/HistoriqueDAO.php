<?php

require_once(__DIR__ . "/CommonDAO.php");
require_once(__DIR__ . "/../MODEL/Historique.php");
require_once(__DIR__ . "/../EXCEPTIONS/HistoriqueDAOException.php");

class HistoriqueDAO extends CommonDAO
{

    // AFFICHAGE HISTORIQUE D'UN MODULE
    public function displayHistoricForModule($idModule)
    {
        try {
            $db = $this->connectionDB();
            $stmt = $db->prepare("SELECT VERSION, TEMPERATURE, SPEED, FLUX, ENERGY, BREAKDOWN, START_ACTIVATION, DURATION FROM historique WHERE ID_MODULE = ? ORDER BY VERSION DESC;");
            $stmt->bind_param('i', $idModule);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON DISPLAYHIST\"";
            throw new HistoriqueDAOException($message);
        }

        $historique = [];
        foreach ($data as $value) {

            $historique[] = (new Historique())
                ->setVersion($value["VERSION"])
                ->setTemperature($value["TEMPERATURE"])
                ->setSpeed($value["SPEED"])
                ->setFlux($value["FLUX"])
                ->setEnergy($value["ENERGY"])
                ->setBreakdown($value["BREAKDOWN"])
                ->setStartActivation($value["START_ACTIVATION"])
                ->setDuration($value["DURATION"]);
        }

        return $historique;
    }

    // AFFICHAGE HISTORIQUE D'UN MODULE (MAXIMUM 10)
    public function displayHistoricForModuleMax10($id)
    {
        try {
            $db = $this->connectionDB();
            $stmt = $db->prepare("SELECT VERSION, TEMPERATURE, SPEED, FLUX, ENERGY, BREAKDOWN, START_ACTIVATION, DURATION FROM historique WHERE ID_MODULE = ? ORDER BY VERSION DESC LIMIT 10;");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON DISPLAYHISTMAX10\"";
            throw new HistoriqueDAOException($message);
        }

        $historique = [];
        foreach ($data as $value) {

            $historique[] = (new Historique())
                ->setVersion($value["VERSION"])
                ->setTemperature($value["TEMPERATURE"])
                ->setSpeed($value["SPEED"])
                ->setFlux($value["FLUX"])
                ->setEnergy($value["ENERGY"])
                ->setBreakdown($value["BREAKDOWN"])
                ->setStartActivation($value["START_ACTIVATION"])
                ->setDuration($value["DURATION"]);
        }

        return $historique;
    }

    // MOYENNE TEMPERATURE
    public function averageTemp($id)
    {
        try {
            $db = $this->connectionDB();
            $stmt = $db->prepare("SELECT ROUND(AVG(TEMPERATURE), 2) AS MOYENNE FROM historique WHERE ID_MODULE = ?;");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON AVGTEMP\"";
            throw new HistoriqueDAOException($message);
        }

        foreach ($data as $value) {

            $moyenne = $value["MOYENNE"];
        }

        return $moyenne;
    }

    // MOYENNE VITESSE
    public function averageSpeed($id)
    {
        try {
            $db = $this->connectionDB();
            $stmt = $db->prepare("SELECT ROUND(AVG(SPEED), 2) AS MOYENNE FROM historique WHERE ID_MODULE = ?;");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON AVGSPEED\"";
            throw new HistoriqueDAOException($message);
        }

        foreach ($data as $value) {

            $moyenne = $value["MOYENNE"];
        }

        return $moyenne;
    }

    // MOYENNE FLUX
    public function averageFlux($id)
    {
        try {
            $db = $this->connectionDB();
            $stmt = $db->prepare("SELECT ROUND(AVG(FLUX), 2) AS MOYENNE FROM historique WHERE ID_MODULE = ?;");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON AVGFLUX\"";
            throw new HistoriqueDAOException($message);
        }

        foreach ($data as $value) {

            $moyenne = $value["MOYENNE"];
        }

        return $moyenne;
    }

    // MOYENNE ENERGIE
    public function averageEnergy($id)
    {
        try {
            $db = $this->connectionDB();
            $stmt = $db->prepare("SELECT ROUND(AVG(ENERGY), 2) AS MOYENNE FROM historique WHERE ID_MODULE = ?;");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON AVGENERGY\"";
            throw new HistoriqueDAOException($message);
        }

        foreach ($data as $value) {

            $moyenne = $value["MOYENNE"];
        }

        return $moyenne;
    }

    // SELECTION DU NOMBRE DE PANNES ENREGISTREES
    public function amountBreakdown($id)
    {
        try {
            $db = $this->connectionDB();
            $stmt = $db->prepare("SELECT COUNT(BREAKDOWN = 1) AS AMOUNT FROM historique WHERE ID_MODULE = ?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON AMOUNTBREAKDOWN\"";
            throw new HistoriqueDAOException($message);
        }

        foreach ($data as $value) {

            $breakdown = $value["AMOUNT"];
        }

        return $breakdown;
    }

    // RECUPERATION DES 15 DERNIERES ENTREES TEMPERATURES
    public function lastTemp15($id)
    {
        try {
            $db = $this->connectionDB();
            $stmt = $db->prepare("SELECT TEMPERATURE from historique WHERE ID_MODULE = ? ORDER BY VERSION DESC LIMIT 15");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON GRAPHTEMP\"";
            throw new HistoriqueDAOException($message);
        }

        return $data;
    }

    // RECUPERATION DES 15 DERNIERES ENTREES VITESSES
    public function lastSpeed15($id)
    {
        try {
            $db = $this->connectionDB();
            $stmt = $db->prepare("SELECT SPEED from historique WHERE ID_MODULE = ? ORDER BY VERSION DESC LIMIT 15");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON GRAPHSPEED\"";
            throw new HistoriqueDAOException($message);
        }

        return $data;
    }

    // RECUPERATION DES 15 DERNIERES ENTREES FLUX
    public function lastFlux15($id)
    {
        try {
            $db = $this->connectionDB();
            $stmt = $db->prepare("SELECT FLUX from historique WHERE ID_MODULE = ? ORDER BY VERSION DESC LIMIT 15");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON GRAPHFLUX\"";
            throw new HistoriqueDAOException($message);
        }

        return $data;
    }

    // RECUPERATION DES 15 DERNIERES ENTREES ENERGIE
    public function lastEnergy15($id)
    {
        try {
            $db = $this->connectionDB();
            $stmt = $db->prepare("SELECT ENERGY from historique WHERE ID_MODULE = ? ORDER BY VERSION DESC LIMIT 15");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON GRAPHENERGY\"";
            throw new HistoriqueDAOException($message);
        }

        return $data;
    }

    // RECUPERATION DES 5 DERNIERES ENTREES PANNES
    public function lastBreakdown5($id)
    {
        try {
            $db = $this->connectionDB();
            $stmt = $db->prepare("SELECT BREAKDOWN from historique WHERE ID_MODULE = ? ORDER BY VERSION DESC LIMIT 5");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON GRAPHINDEX\"";
            throw new HistoriqueDAOException($message);
        }

        return $data;
    }
}
