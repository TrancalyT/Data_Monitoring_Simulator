<?php 

include_once(__DIR__ . "/view/view_sidenav.php");
include_once(__DIR__ . "/view/view_navbar.php");
include_once(__DIR__ . "/view/view_head.php");
include_once(__DIR__ . "/view/view_footer.php");
include_once(__DIR__ . "/view/view_details.php");
include_once(__DIR__ . "/SERVICE/ModuleService.php");
include_once(__DIR__ . "/SERVICE/HistoriqueService.php");
include_once(__DIR__ . "/SERVICE/DetailsService.php");

//
callHead("details");
callNavBar();
callSideNav();

// APPEL DES DIFFERENTS MODULES
try{
    $modules = (new ModuleService())->displayAllModules();
} catch (ModuleServiceException $error) {
    $message = $error->getMessage();
    header("Location: ../index.php?info=$message");
}

// APPEL DES MOYENNES
$hist = new HistoriqueService();

try{
    $moyennes = [
        "TEMP" => $hist->averageTemp($_SESSION['id']),
        "SPEED" => $hist->averageSpeed($_SESSION['id']),
        "FLUX" => $hist->averageFlux($_SESSION['id']),
        "ENERGY" => $hist->averageEnergy($_SESSION['id'])
    ];
} catch (HistoriqueServiceException $error) {
    $message = $error->getMessage();
    header("Location: ../index.php?info=$message");
}

// RECUPERATION DE LA DUREE DE LA DERNIERE MISE EN MARCHE
$detail = new DetailsService();
try{
    $duration = $detail->selectLastActivation($_SESSION['id']);
} catch (DetailsServiceException $error) {
    $message = $error->getMessage();
    header("Location: ../index.php?info=$message");
}

// RECUPERATION DU NOMBRE DE PANNES
try{
    $breakdown = $hist->amountBreakdown($_SESSION['id']);
} catch (HistoriqueServiceException $error) {
    $message = $error->getMessage();
    header("Location: ../index.php?info=$message");
}

// AFFICHAGE DETAILS
callDetails($modules,$moyennes, $duration, $breakdown);

//
callFooter();
