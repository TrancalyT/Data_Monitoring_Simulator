<?php 

include_once(__DIR__ . "/view/view_sidenav.php");
include_once(__DIR__ . "/view/view_navbar.php");
include_once(__DIR__ . "/view/view_head.php");
include_once(__DIR__ . "/view/view_footer.php");
include_once(__DIR__ . "/view/view_quisuisje.php");

//
callHead("quisuisje");
callNavBar();
callSideNav();

// AFFICHAGE PROFIL
callProfilCard();

//
callFooter();

?>