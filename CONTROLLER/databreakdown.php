<?php

include_once(__DIR__ . "/../SERVICE/HistoriqueService.php");
session_start();

// RECUP DES 5 DERNIERES DONNEES PANNES POUR ENVOI VERS JSON
$breakdown = (new HistoriqueService())->lastBreakdown5($_SESSION['id']);
$tab = [];

foreach($breakdown as $value){
 
    $tab[] = $value["BREAKDOWN"];
};

echo json_encode($tab);
?>