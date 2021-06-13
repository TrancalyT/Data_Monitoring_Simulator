<?php

include_once(__DIR__ . "/../SERVICE/HistoriqueService.php");
session_start();

// RECUP DES 15 DERNIERES DONNEES DE VITESSE POUR ENVOI VERS JSON
$speed = (new HistoriqueService())->lastSpeed15($_SESSION['id']);
$tab = [];

foreach($speed as $value){
 
    $tab[] = $value["SPEED"];
};

echo json_encode($tab);
?>