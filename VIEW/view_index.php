<?php

function callIndex($modules, $hist)
{
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tableau de bord</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?= mb_strtoupper($_SESSION['name']) ?></li>
                </ol>
                <div class="container">
                    <div class="alert alert-dark" role="alert">
                        <h4 class="alert-heading">Bienvenue !</h4>
                        <p>Veuillez séléctionner votre module, ou créez en un si vous le souhaitez.</p>
                        <hr>
                        <p class="mb-0">Une fois séléctionné, lancez la simulation quand vous êtes prêt 😉 !<br /></p>
                        <p class="font-monospace text-uppercase" style="font-size:smaller"><i class="fas fa-exclamation-triangle"></i> Veuillez attendre la notification "Simulation réussie".</p>
                    </div>
                    <div class="buttons">
                    </div>
                    <div class="button1">
                        <button class="btn btn-dark btn-lg dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                            Séléctionnez votre module
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php
                            foreach ($modules as $value) {
                                $moduleNom = $value->getName();
                                $moduleID = $value->getId();
                            ?>
                                <li><a class="dropdown-item" href="CONTROLLER/selected_module.php?id=<?= $moduleID ?>&name=<?= $moduleNom ?>"><?= $moduleNom  ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="button2">
                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Création de module
                        </button>
                    </div>
                </div>
            </div>
            <!-- MODAL -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Entrez le nom de votre module</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="CONTROLLER/add_module_process.php" method="post">
                                <input type="text" class="form-control" name="name">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Retour</button>
                            <button type="submit" class="btn btn-primary">GO !</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="tableau">
                    <div class="card-header cardtab">
                        <div class="row titlecard">
                            <div class="col-9">
                                <p class="text-start fst-italic txtcard"><i class="fas fa-table me-1"></i> Affichage des 10 dernières entrées</p>
                            </div>
                            <div class="col-3">
                                <p class="text-end fst-italic fw-light fs-6 txtcard"><a href="historique.php">Voir plus ...</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-info table-hover table-striped talbe-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre d'entrées de données</th>
                                    <th>Température (en °)</th>
                                    <th>Vitesse (en Mbit)</th>
                                    <th>Flux (en o/s)</th>
                                    <th>Énergie (en W/h)</th>
                                    <th>Panne</th>
                                    <th>Activé à</th>
                                    <th>Durée</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($hist as $value) {
                                    $version = $value->getVersion();
                                    $temperature = $value->getTemperature();
                                    $speed = $value->getSpeed();
                                    $flux = $value->getFlux();
                                    $energy = $value->getEnergy();
                                    $breakdown = $value->getBreakdown();
                                    $start = $value->getStartActivation();
                                    $duration = $value->getDuration();

                                    if ($breakdown) {
                                        $breakdown = "OUI";
                                    } else {
                                        $breakdown = "NON";
                                    }
                                ?>
                                    <tr>
                                        <td><?= $version ?></td>
                                        <td><?= $temperature ?></td>
                                        <td><?= $speed ?></td>
                                        <td><?= $flux ?></td>
                                        <td><?= $energy ?></td>
                                        <td><?= $breakdown ?></td>
                                        <td><?= $start ?></td>
                                        <td><?= $duration ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="graph">
                    <div class="card-header cardgraph">
                        <div class="row titlecard">
                            <div class="col-9">
                                <p class="text-start fst-italic txtcard"><i class="fas fa-chart-area"></i> Evolution des données sur les 5 dernières entrées</p>
                            </div>
                            <div class="col-3">
                                <p class="text-end fst-italic fw-light fs-6 txtcard"><a href="graphique.php">Voir plus ...</a></p>
                            </div>
                        </div>
                    </div>
                    <canvas id="graph" width="100" height="100"></canvas>
                </div>
            </div>
        </main>

        <script src="js/chart.js"></script>
        <script>
            ////////////////////////////// GRAPH
            $(function() {
                $.getJSON("CONTROLLER/databreakdown.php", function(breakdown) {

                    var ctx = document.getElementById("graph");
                    var datagraph = {
                        labels: [1, 2, 3, 4, 5],
                        datasets: [{
                            backgroundColor: '#bf0a0a',
                            borderColor: '#bf0a0a',
                            label: 'Pannes (vide si aucune)',
                            data: [breakdown[0], breakdown[1], breakdown[2], breakdown[3], breakdown[4]],
                        }]
                    };

                    var graph = new Chart(ctx, {
                        type: 'bar',
                        data: datagraph,

                    });
                });
            });
        </script>

    <?php
}

    ?>