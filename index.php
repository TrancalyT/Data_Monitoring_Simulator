<?php 

include_once(__DIR__ . "/view/view_sidenav.php");
include_once(__DIR__ . "/view/view_navbar.php");
include_once(__DIR__ . "/view/view_head.php");
include_once(__DIR__ . "/view/view_footer.php");
include_once(__DIR__ . "/view/view_index.php");
include_once(__DIR__ . "/SERVICE/ModuleService.php");
include_once(__DIR__ . "/SERVICE/HistoriqueService.php");

//
callHead("index");
callNavBar();
callSideNav();

// APPEL DES DIFFERENTS MODULES
try{
    $modules = (new ModuleService())->displayAllModules();
} catch (ModuleServiceException $error) {
    $message = $error->getMessage();
    header("Location: ../index.php?info=$message");
}

// HISTORIQUE POUR MODULE (MAX 10)
try {
    $hist = (new HistoriqueService())->displayHistoricForModuleMax10(intval($_SESSION['id']));
} catch (HistoriqueServiceException $error) {
    $message = $error->getMessage();
    header("Location: ../index.php?info=$message");
}

// AFFICHAGE INDEX
callIndex($modules, $hist);

//
callFooter();

?>