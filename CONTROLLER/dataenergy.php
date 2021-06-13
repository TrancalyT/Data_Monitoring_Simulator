<?php

include_once(__DIR__ . "/../SERVICE/HistoriqueService.php");
session_start();

// RECUP DES 15 DERNIERES DONNEES D'ENERGIE POUR ENVOI VERS JSON
$energy = (new HistoriqueService())->lastEnergy15($_SESSION['id']);
$tab = [];

foreach($energy as $value){
 
    $tab[] = $value["ENERGY"];
};

echo json_encode($tab);
?>