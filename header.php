<?php
include_once 'admin/pdo.php';
include_once 'admin/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Suez+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>AZE</title>
</head>

<body>

    <div id="app">

        <!-- NAVBAR -->

        <nav class="navbar navbar-front navbar-expand-lg navbar-light bg-secondary fixed-top">

            <router-link to="/">
                <div class="logo">
                    <img src="assets/img/logo_transparent.png" alt="logo" class="logo-img">
                </div>
            </router-link>

            <router-link to="/" class="branding d-flex justify-content-center align-items-center">
                <div class="left-stick"></div>
                <p class="slogan">Le street wear nantais</p>
                <div class="right-stick"></div>
            </router-link>

            <?php if (@($_SESSION['user_role']) == 5) { ?>
                <a href="admin/index.php" class="btn btn-warning btn-sm ml-4 bo-btn">Back-Office</a>
                <a href="admin/index.php" class="btn btn-warning btn-sm ml-4 bo-btn-small d-none">BO</a>
            <?php } ?>

            <button class="navbar-toggler navbar-toggler-front" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav navbar-nav-front ml-auto">
                    <li class="nav-item nav-item-contact">
                        <router-link class="nav-link text-secondary" to="/contact">Contact <span class="nav-icon"><i class="fas fa-comment"></i></span></router-link>
                    </li>
                    <li class="nav-item nav-item-panier">
                        <router-link class="nav-link text-secondary" to="/cart">Panier <span class="nav-icon"><i class="fas fa-shopping-cart"></i></span></router-link>
                    </li>
                    <!-- Sign out button -->
                    <?php if (isset($_SESSION['user_name'])) { ?>
                        <li class="nav-item mr-0">
                            <a href="logout.php" class="nav-link text-secondary">Déconnexion <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link text-secondary">Connexion <span class="nav-icon"><i class="fas fa-sign-in-alt"></i></span></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

        </nav>


        <div class="second-nav bg-secondary pb-1 shadow-sm">
            <ul class="d-flex pl-0 list-unstyled">
                <li>
                    <router-link class="nav-link text-secondary d-inline-block pl-0" to="/about">Histoire d'Aze</router-link>
                </li>
                <li>
                    <a href="#" class="nav-link text-secondary d-inline-block pl-0">Évènements</a>
                </li>
                <li>
                    <a href="#" class="nav-link text-secondary d-inline-block pl-0">Blog</a>
                </li>
            </ul>
            <!-- Greeting  -->
            <?php if (isset($_SESSION['user_name'])) { ?>
                <small class="greeting-guest text-capitalize">Bonjour, <?php echo $_SESSION['user_name'] ?>.</small>
            <?php } ?>
        </div>

        <!-- Router View -->
        <router-view :key="$route.path"></router-view>