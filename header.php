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

        <nav class="navbar navbar-expand-lg navbar-light bg-secondary fixed-top">

            <router-link to="/">
                <div class="logo">
                    <img src="assets/img/logo_transparent.png" alt="logo" class="logo-img">
                </div>
            </router-link>

            <div class="left-stick"></div>
            <p class="slogan">Le street wear nantais</p>
            <div class="right-stick"></div>
            <?php if (@($_SESSION['user_role']) == 5 ) { ?>
                <a href="admin/index.php" class="btn btn-warning btn-sm ml-4">Back-Office</a>
            <?php } ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <router-link class="nav-link text-secondary" to="/contact">Contact <span class="nav-icon"><i class="fas fa-comment"></i></span></router-link>
                    </li>
                    <li class="nav-item">
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
            <ul class="d-flex list-unstyled">
                <li v-for="category in allCategories" class="nav-item">
                    <a href="#" class="nav-link text-secondary p-0">{{ category.category_name }}</a>
                </li>
            </ul>
            <!-- Greeting  -->
            <?php if (isset($_SESSION['user_name'])) { ?>
                <small class="greeting-guest text-capitalize">Bonjour, <?php echo $_SESSION['user_name'] ?>.</small>
            <?php } ?>
        </div>

        <!-- Router View -->
        <router-view :key="$route.path"></router-view>