<?php 

include_once(__DIR__ . "/view/view_sidenav.php"); 
include_once(__DIR__ . "/view/view_navbar.php"); 
include_once(__DIR__ . "/view/view_head.php"); 
include_once(__DIR__ . "/view/view_footer.php"); 
include_once(__DIR__ . "/view/view_historique.php");
include_once(__DIR__ . "/SERVICE/ModuleService.php");
include_once(__DIR__ . "/SERVICE/HistoriqueService.php");

//
callHead("historique"); 
callNavBar();
callSideNav();

// APPEL DES DIFFERENTS MODULES
try{
    $modules = (new ModuleService())->displayAllModules();
} catch (ModuleServiceException $error) {
    $message = $error->getMessage();
    header("Location: ../index.php?info=$message");
}

// HISTORIQUE POUR MODULE
try {
    $hist = (new HistoriqueService())->displayHistoricForModule(intval($_SESSION['id']));
} catch (HistoriqueServiceException $error) {
    $message = $error->getMessage();
    header("Location: ../index.php?info=$message");
}

// AFFICHAGE HISTORIQUE
callHisto($modules, $hist);

callFooter();

?>