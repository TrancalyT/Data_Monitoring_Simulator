<?php

function callGraph($modules)
{
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Graphique</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Graphique <?= mb_strtoupper($_SESSION['name']) ?></li>
                </ol>
                <form action="" method="post" id="formselect">
                    <div class="card-body">
                        <div class="row" id="formmodule">
                            <div class="col-11">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect">
                                        <option selected>Séléctionnez votre choix</option>
                                        <?php
                                        foreach ($modules as $value) {
                                            $moduleNom = $value->getName();
                                            $moduleID = $value->getId();
                                        ?>
                                            <option value="<?= $moduleID  ?>"><?= $moduleNom ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Choix du module :</label>
                                </div>
                            </div>
                            <div class="col-1" style="align-self: center;">
                                <button type="submit" class="btn btn-primary btn-lg buttongo">Go</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="container">
                            <div class="graph1 responsivechart">
                                <canvas id="graph1" width="500" height="500"></canvas>
                            </div>
                            <div class="graph2 responsivechart">
                                <canvas id="graph2" width="500" height="500"></canvas>
                            </div>
                            <div class="graph3 responsivechart">
                                <canvas id="graph3" width="500" height="500"></canvas>
                            </div>
                            <div class="graph4 responsivechart">
                                <canvas id="graph4" width="500" height="500"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
        </main>

        <script src="js/chart.js"></script>
        <script>
                ////////////////////////////// GRAPH 1
                $(function() {
                    $.getJSON("CONTROLLER/datatemp.php", function(temp) {

                        var ctx1 = document.getElementById("graph1");
                        var datagraph1 = {
                            labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
                            datasets: [{
                                backgroundColor: '#f59042',
                                borderColor: '#f59042',
                                label: '15 dernières Températures (en °)',
                                data: [temp[0],temp[1],temp[2],temp[3],temp[4],temp[5],temp[6],temp[7],temp[8],temp[9],temp[10],temp[11],temp[12],temp[13],temp[14]],
                            }]
                        };

                        var graph1 = new Chart(ctx1, {
                            type: 'line',
                            data: datagraph1,

                        });
                    });
                });

                ////////////////////////////// GRAPH 2
                $(function() {
                    $.getJSON("CONTROLLER/dataspeed.php", function(speed) {

                        var ctx2 = document.getElementById("graph2");
                        var datagraph2 = {
                            labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
                            datasets: [{
                                backgroundColor: '#E6CF7C',
                                borderColor: '#E6CF7C',
                                label: 'Bande passante (en Mbits)',
                                data: [speed[0],speed[1],speed[2],speed[3],speed[4],speed[5],speed[6],speed[7],speed[8],speed[9],speed[10],speed[11],speed[12],speed[13],speed[14]],
                            }]
                        };

                        var graph2 = new Chart(ctx2, {
                            type: 'line',
                            data: datagraph2,

                        });

                    });
                });

                ////////////////////////////// GRAPH 3
                $(function() {
                    $.getJSON("CONTROLLER/dataflux.php", function(flux) {

                        var ctx3 = document.getElementById("graph3");
                        var datagraph3 = {
                            labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
                            datasets: [{
                                backgroundColor: '#D7E64E',
                                borderColor: '#D7E64E',
                                label: 'Flux envoyés (en octets/sec)',
                                data: [flux[0],flux[1],flux[2],flux[3],flux[4],flux[5],flux[6],flux[7],flux[8],flux[9],flux[10],flux[11],flux[12],flux[13],flux[14]],
                            }]
                        };

                        var graph3 = new Chart(ctx3, {
                            type: 'bar',
                            data: datagraph3,

                        });

                    });
                });

                ////////////////////////////// GRAPH 4
                $(function() {
                    $.getJSON("CONTROLLER/dataenergy.php", function(energy) {

                        var ctx4 = document.getElementById("graph4");
                        var datagraph4 = {
                            labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
                            datasets: [{
                                backgroundColor: '#4EE679',
                                borderColor: '#4EE679',
                                label: 'Énergie consommées (en W/h)',
                                data: [energy[0],energy[1],energy[2],energy[3],energy[4],energy[5],energy[6],energy[7],energy[8],energy[9],energy[10],energy[11],energy[12],energy[13],energy[14]],
                            }]
                        };

                        var graph4 = new Chart(ctx4, {
                            type: 'bar',
                            data: datagraph4,

                        });
                    });
                });
        </script>
    <?php
}

    ?>