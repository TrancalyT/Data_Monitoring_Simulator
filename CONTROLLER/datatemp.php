<?php

include_once(__DIR__ . "/../SERVICE/HistoriqueService.php");
session_start();

// RECUP DES 15 DERNIERES DONNEES DE TEMPERATURE POUR ENVOI VERS JSON
$temp = (new HistoriqueService())->lastTemp15($_SESSION['id']);
$tab = [];

foreach($temp as $value){
 
    $tab[] = $value["TEMPERATURE"];
};

echo json_encode($tab);
?>