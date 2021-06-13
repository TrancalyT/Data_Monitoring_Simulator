<?php

function callHisto($modules, $hist)
{
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Historique</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Historique <?= mb_strtoupper($_SESSION['name']) ?></li>
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
                    <div class="card mb-4" style="border:none;">
                        <div class="card-body">
                            <table class="table table-info" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-columns-toggle-all="true" data-mobile-responsive="true">
                                <thead>
                                    <tr>
                                        <th data-sortable="true" data-field="version">Nombre d'entrées de données</th>
                                        <th data-sortable="true" data-field="temp">Température (en °)</th>
                                        <th data-sortable="true" data-field="speed">Vitesse (en Mbit)</th>
                                        <th data-sortable="true" data-field="flux">Flux (en o/s)</th>
                                        <th data-sortable="true" data-field="energy">Énergie (en W/h)</th>
                                        <th data-sortable="true" data-field="breakdown">Panne</th>
                                        <th data-sortable="true" data-field="activate">Activé à</th>
                                        <th data-sortable="true" data-field="duration">Durée</th>
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
                </div>
        </main>

    <?php
}

    ?>