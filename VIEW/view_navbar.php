<?php

function callNavBar()
{
?>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Title-->
            <a class="navbar-brand ps-3" href="index.php">IoT Monitoring</a>
            <!-- Sidebar Toggle ON / OFF -->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <?php
            // ALERT MESSAGE
            if (@$_GET['info']){
            ?>
                <div class="alert alert-light" style="margin-left:auto;" role="alert"><?= @$_GET['info'] ?></div>
            <?php  
            }
            ?>
            <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-address-card fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="readme.php">Read me !</a></li>
                        <li><a class="dropdown-item" href="quisuisje.php">Qui-suis je ?</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="CONTROLLER/reset.php">Reset session</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

    <?php
}

    ?>