<?php

function callDetails($modules, $moyennes, $duration, $breakdown)
{
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Détails</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Détails <?= mb_strtoupper($_SESSION['name']) ?></li>
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
                <div class="container border bg-light pt-2 pb-2">
                    <div class="imgtemp">
                        <div class="card" style="background-color:#f59042">
                            <img src="img/temperature.png" class="card-img-top" alt="temperature">
                            <div class="card-body">
                                <h5 class="card-title">Température</h5>
                                <h6 class="card-subtitle mb-2 text-muted">degré °</h6>
                                <p class="card-text">en moyenne</p>
                            </div>
                        </div>
                    </div>
                    <div class="txttemp align-self-center text-center bigdata">
                        <p class="fs-1 fw-bold font-monospace text-muted"><?= $moyennes["TEMP"] ?> °</p>
                    </div>
                    <div class="imgspeed">
                        <div class="card" style="background-color:#E6CF7C">
                            <img src="img/speed.png" class="card-img-top" alt="speed">
                            <div class="card-body">
                                <h5 class="card-title">Vitesse</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Megabit</h6>
                                <p class="card-text">en moyenne</p>
                            </div>
                        </div>
                    </div>
                    <div class="txtspeed align-self-center text-center bigdata">
                        <p class="fs-1 fw-bold font-monospace text-muted"><?= $moyennes["SPEED"] ?> Mbits</p>
                    </div>
                    <div class="imgflux">
                        <div class="card" style="background-color:#D7E64E">
                            <img src="img/flux.png" class="card-img-top" alt="flux">
                            <div class="card-body">
                                <h5 class="card-title">Flux</h5>
                                <h6 class="card-subtitle mb-2 text-muted">octet/s</h6>
                                <p class="card-text">en moyenne</p>
                            </div>
                        </div>
                    </div>
                    <div class="txtflux align-self-center text-center bigdata">
                        <p class="fs-1 fw-bold font-monospace text-muted"><?= $moyennes["FLUX"] ?> o/s</p>
                    </div>
                    <div class="imgenergy">
                        <div class="card" style="background-color:#4EE679">
                            <img src="img/energy.png" class="card-img-top" alt="energie">
                            <div class="card-body">
                                <h5 class="card-title">Énergie</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Watts/h</h6>
                                <p class="card-text">en moyenne</p>
                            </div>
                        </div>
                    </div>
                    <div class="txtenergy align-self-center text-center bigdata">
                        <p class="fs-1 fw-bold font-monospace text-muted"><?= $moyennes["ENERGY"] ?> W/h</p>
                    </div>
                </div>
                <div class="row align-items-center time">
                    <div class="col-1 order-first">
                        <i class="fas fa-clock pannefont"></i>
                    </div>
                    <div class="col thebadge">
                        <h1><span class="badge bg-success durationfield"> Durée de la dernière mise en marche : </span></h1>
                    </div>
                    <div class="col order-last">
                        <p class="fst-italic fs-4 text-end"><?= $duration ?></p>
                    </div>
                </div>
                <div class="row align-items-center panne">
                    <div class="col-1 order-first">
                        <i class="fas fa-tools pannefont"></i>
                    </div>
                    <div class="col thebadge">
                        <h1><span class="badge bg-warning breakfield"> Nombre de pannes enregistrées : </span></h1>
                    </div>
                    <div class="col order-last textebreak">
                        <p class="fst-italic fs-4 text-end"><?= $breakdown ?> pannes</p>
                    </div>
                </div>
        </main>

    <?php
}

    ?>