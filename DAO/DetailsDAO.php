<?php

require_once(__DIR__ . "/CommonDAO.php");
require_once(__DIR__ . "/../MODEL/Details.php");
require_once(__DIR__ . "/../EXCEPTIONS/DetailsDAOException.php");

class DetailsDAO extends CommonDAO
{
    // INSERTION DES DONNES ALEATOIRES
    public function insertDetails($details, $id)
    {
        $temperature = $details->getTemperature();
        $speed = $details->getSpeed();
        $flux = $details->getFlux();
        $energy = $details->getEnergy();
        $breakdown = $details->getBreakdown();
        $start = $details->getStartActivation();
        $duration = $details->getDuration();

        try {
            $db = parent::connectionDB();

            $query = "UPDATE details SET TEMPERATURE = ?,
                                         SPEED = ?,
                                         FLUX = ?,
                                         ENERGY = ?,
                                         BREAKDOWN = ?,
                                         START_ACTIVATION = ?,
                                         DURATION = ?
                                         WHERE ID_MODULE = ?;";

            $stmt = $db->prepare($query);
            $stmt->bind_param(
                "sssssssi",
                $temperature,
                $speed,
                $flux,
                $energy,
                $breakdown,
                $start,
                $duration,
                $id,
            );

            $stmt->execute();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON INSERTDETAILS\"";
            throw new DetailsDAOException($message);
        }
    }

    // INSERTION DONNEES NEUTRE LORS D'UNE CREATION DE MODULE
    public function insertNewDetails($id)
    {
        try {
            $db = parent::connectionDB();

            $query =  "INSERT INTO details
            (ID, VERSION, TEMPERATURE, SPEED, FLUX, ENERGY, BREAKDOWN, START_ACTIVATION, DURATION, ID_MODULE)
            VALUES (null, 0, '0', '0', '0', '0', false, NOW(), '00:00:00', ?)";

            $stmt = $db->prepare($query);
            $stmt->bind_param("i", $id,);
            $stmt->execute();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON INSERTNEWDETAILS\"";
            throw new DetailsDAOException($message);
        }
    }

    // SELECTION DE LA DERNIERE DUREE ACTIVATION
    public function selectLastActivation($id)
    {
        try {
            $db = parent::connectionDB();

            $query =  "SELECT DURATION FROM details WHERE ID_MODULE = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " . $error->getCode() . " ON LASTACTIVATION\"";
            throw new DetailsDAOException($message);
        }

        foreach ($data as $value) {

            $detail = $value["DURATION"];
        }

        return $detail;
    }
    
}
