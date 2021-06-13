<?php

function callSideNav()
{
?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Index</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Tableau de bord
                        </a>
                        <div class="sb-sidenav-menu-heading">Modules</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Gestion
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="details.php">Détails modules</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Informations
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="historique.php">Historique</a>
                                <a class="nav-link" href="graphique.php">Graphique</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Extra</div>
                        <a class="nav-link" href="readme.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Read me !
                        </a>
                        <a class="nav-link" href="quisuisje.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-info"></i></div>
                            Qui suis-je ?
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small pb-2"><?= mb_strtoupper($_SESSION['name']) ?></div>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#collapseSimulation">Lancer simulation</button>
                    </div>
                    <div class="collapse pt-2" id="collapseSimulation">
                        <div class="card card-body" style="background-color:#282a38; color:white;">
                            <div class="modal-header">
                                <h6 class="modal-title">Vos paramètres :</h6>
                            </div>
                            <div class="body pt-2">
                                <form action="CONTROLLER/simulation_process.php" method="post">
                                    <label for="duration" class="form-label" style="font-size:smaller;">Durée de la simulation <br/> (30 secondes maximum) : </label>
                                    <input type="time" class="form-control form-control-sm" name="duration" step="1" min="00:00:00" max="00:00:30">
                                    <label for="iteration" class="form-label" style="font-size:smaller;">Nombre d'itération <br/> (20 itérations maximum) : </label>
                                    <input type="number" class="form-control form-control-sm" name="iteration" max="20">
                            </div>
                            <div class="modal-footer justify-content-center">
                            <span class="spinner-grow spinner-grow-sm" role="status"></span>
                            <button type="submit" class="btn btn-warning btn-sm" style="color:#343a40;">Lancez !</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

    <?php
}

    ?>