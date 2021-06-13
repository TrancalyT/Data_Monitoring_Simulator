<?php 

include_once(__DIR__ . "/view/view_sidenav.php");
include_once(__DIR__ . "/view/view_navbar.php");
include_once(__DIR__ . "/view/view_head.php");
include_once(__DIR__ . "/view/view_footer.php");
include_once(__DIR__ . "/view/view_graphique.php");
include_once(__DIR__ . "/SERVICE/ModuleService.php");

//
callHead("graphique");
callNavBar();
callSideNav();

// APPEL DES DIFFERENTS MODULES
try{
    $modules = (new ModuleService())->displayAllModules();
} catch (ModuleServiceException $error) {
    $message = $error->getMessage();
    header("Location: ../index.php?info=$message");
}

// AFFICHAGE GRAPHIQUE
callGraph($modules);

//
callFooter();

?>