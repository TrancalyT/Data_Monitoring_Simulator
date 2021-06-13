<?php

include_once(__DIR__ . "/../SERVICE/HistoriqueService.php");
session_start();

// RECUP DES 15 DERNIERES DONNEES DE FLUX POUR ENVOI VERS JSON
$flux = (new HistoriqueService())->lastFlux15($_SESSION['id']);
$tab = [];

foreach($flux as $value){
 
    $tab[] = $value["FLUX"];
};

echo json_encode($tab);
?>