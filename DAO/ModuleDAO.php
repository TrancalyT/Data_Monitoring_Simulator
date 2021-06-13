<?php

require_once(__DIR__ . "/CommonDAO.php");
require_once(__DIR__ . "/../MODEL/Module.php");
require_once(__DIR__ . "/../EXCEPTIONS/ModuleDAOException.php");

class ModuleDAO extends CommonDAO
{

    // AFFICHAGE DES MODULES
    public function displayAllModules()
    {
        try {
            $db = parent::connectionDB();
            $stmt = $db->prepare("SELECT * FROM module ORDER BY ID ASC;");
            $stmt->execute();
            $result = $stmt->get_result();

            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " .$error->getCode(). " ON DISPLAYMOD\"";
            throw new ModuleDAOException($message);
        }

        $modules = [];
        foreach ($data as $value) {
            $modules[] = (new Module)
                ->setID($value['ID'])
                ->setNAME($value['NAME']);
        }

        return $modules;
    }

    // CHECK SI NOM DU MODULE EXISTE
    public function ifAlreadyExist($nom)
    {
        try {
            $db = parent::connectionDB();
            $stmt = $db->prepare("SELECT NAME FROM module WHERE NAME = ?;");
            $stmt->bind_param('s', $nom);
            $stmt->execute();
            $result = $stmt->get_result();

            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " .$error->getCode(). " ON IFALREADYEXIST\"";
            throw new ModuleDAOException($message);
        }

        if($data == null){
            return false;
        } else {
            return true;
        }
    }

    // AJOUT D'UN NOUVEAU MODULE
    public function addModule($nom)
    {
        try {
            $db = parent::connectionDB();
            $stmt = $db->prepare("INSERT INTO module (ID, NAME) VALUES (NULL, ?);");
            $stmt->bind_param('s', $nom);
            $stmt->execute();
            
            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " .$error->getCode(). " ON ADDMODULE\"";
            throw new ModuleDAOException($message);
        }

    }

    // RECHERCHE DU DERNIER ID
    public function selectLastId()
    {
        try{
            $db = parent::connectionDB();
            $stmt = $db->prepare("SELECT MAX(ID) AS ID FROM module;");
            $stmt->execute();
            $result = $stmt->get_result();

            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();

            $db->close();
        } catch (mysqli_sql_exception $error) {
            $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement. Si le problème persiste, veuillez nous contacter en nous communiquant l'erreur suivante : \"ERROR CODE : " .$error->getCode(). " ON SELECTLASTID\"";
            throw new ModuleDAOException($message);
        }

        foreach ($data as $value) {
            $modules = ($value['ID']);
        }

        return $modules;
    }

}
