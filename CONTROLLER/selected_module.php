<?php

// SESSION POUR MODULE SELECTIONNE (Check si method Ajax ou Get)
if (!$_REQUEST['ajax']){
    session_destroy();

    $moduleNom = $_REQUEST['name'];
    $moduleId = $_REQUEST['id'];

    session_start();
    $_SESSION['id'] = $moduleId;
    $_SESSION['name'] = $moduleNom;

    header("Location: ../index.php");
} else {

    $moduleNom = $_REQUEST['name'];
    $moduleId = $_REQUEST['id'];

    session_start();
    $_SESSION['id'] = $moduleId;
    $_SESSION['name'] = $moduleNom;

    echo "Well done";

}
