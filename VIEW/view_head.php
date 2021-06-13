<?php

session_start();
if (!$_SESSION){

    $_SESSION['id'] = 1;
    $_SESSION['name'] = "Téléphone";
}

function callHead($css)
{
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="Anthony REINA" />
        <title>IoT Monitoring</title>
        <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/bootstrap.min.v4.css" rel="stylesheet" />
        <link href="css/bootstrap-table.min.css" rel="stylesheet" />
        <link href="css/<?= $css; ?>.css" rel="stylesheet"/>
        <script src="js/jquery-3.6.0.min.js"></script>
    </head>

<?php
}

?>