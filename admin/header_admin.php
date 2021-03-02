<?php
include_once 'pdo.php';
include_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>AZE | Back-Office</title>
</head>

<body style="background-color: #fff;">

    <!-- NAVBAR -->
    <nav class="navbar navbar-back navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand font-weight-bold" href="index.php">AZE | <span class="text-warning">Back-Office</span></a>
        <a href="../index.php" class="btn btn-warning btn-sm fo-btn">Front-Office</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-item-bo dropdown mr-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        GÉRER LES PRODUITS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="add_product.php">AJOUTER UN PRODUIT</a>
                        <a class="dropdown-item" href="update_product.php">MODIFIER UN PRODUIT</a>
                    </div>
                </li>
                <li class="nav-item nav-item-bo mr-2">
                    <a class="nav-link text-white" href="reviews.php">GÉRER LES AVIS</a>
                </li>
                <li class="nav-item nav-item-bo mr-2">
                    <a href="../logout.php" class="nav-link text-white sign-out">Déconnexion <i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
            <!-- Greeting  -->
            <small class="text-white mr-2 text-capitalize greeting">Bienvenue, Topaze.</small>
        </div>

    </nav>