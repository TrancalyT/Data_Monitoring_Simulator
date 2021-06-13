<?php

// RESET EN CAS DE SESSION DEJA INSTACIEE
session_start();
session_destroy();

$message =  "Session réinitialisée.";
header("Location: ../index.php?info=$message");

?>