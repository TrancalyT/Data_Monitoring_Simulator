<?php

include_once(__DIR__ . "/../SERVICE/DetailsService.php");
session_start();

// REGEX DES PARAMETRES
$regexTime = "#^00:00:[0-3]0|[0-2][0-9]$#";
$regexIteration = "#^[0-9]|1[0-9]|20$#";

if (isset($_POST)) {

    $duration = $_POST['duration'];
    $iteration = $_POST['iteration'];
    
    // TRANSFORMATION DE LA DUREE EN INT
    $durationRework = intval(substr($duration, -2));
    // SIMULATION DU TEMPS (Programme en pause = le temps précisé à la simulation)
    sleep($durationRework);

    if (isset($duration) && !empty($duration)
    && isset($iteration) && !empty($iteration)) {

        if (!preg_match($regexTime, $duration)){
            $message =  "Erreur : Veuillez saisir une durée du programme correcte.";
            header("Location: ../index.php?info=$message");
        }
        if (!preg_match($regexIteration, $iteration)){
            $message =  "Erreur : Veuillez saisir un nombre d'itération conforme.";
            header("Location: ../index.php?info=$message");
        }

        if(preg_match($regexTime, $duration) && preg_match($regexIteration, $iteration)){

            // BOUCLE QUI GENERE DES DONNEES ALEATOIRES
            for ($i = 0; $i <= $iteration; $i++){

                try {
                    $temperature = mt_rand(10, 35);
                    $speed = mt_rand(3, 15);
                    $flux = mt_rand(15000, 99999);
                    $energy = mt_rand(50, 400);
                    $breakdownBool = rand(1, 20);
    
                    if ($breakdownBool == 1){
                        $breakdown = true;
                    } else {
                        $breakdown = false;
                    }
    
                    $start = date('Y-m-d H:i:s');
                    $duration = $duration;
                    $id = $_SESSION['id'];

                    $module = (new Module())->setId($id);

                    $details = (new Details())->setTemperature($temperature)
                                              ->setSpeed($speed)
                                              ->setFlux($flux)
                                              ->setEnergy($energy)
                                              ->setBreakdown($breakdown)
                                              ->setStartActivation($start)
                                              ->setDuration($duration);

                    $detailsService = (new DetailsService())->insertDetails($details, $id);

                } catch (DetailsServiceException $error) {
                    $message = $error->getMessage();
                    header("Location: ../index.php?info=$message");
                }

            }

            $message =  "Simulation réussie, fin de la simulation (Durée : $durationRework secondes).";
            
            // Ligne à décommenté si problème de redirection.
            // header("Location: ../index.php?info=$message");
            header("Location: ".$_SERVER['HTTP_REFERER']."?info=$message");
        }
            
    } else {
        $message =  "Erreur : Veuillez saisir et remplir les informations manquantes.";
        header("Location: ../index.php?info=$message");
    }

} else {

    $message =  "Erreur : Vous ne pouvez accéder à cette page.";
    header("Location: ../index.php?info=$message");
}
