<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECH AERO</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" type="image/png" href="<?php echo BASEURL; ?>img/logo.png">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
</head>

<body>
<div class="page-container">
    <nav class="navbar py-4 navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid">
            <a href="<?php echo BASEURL; ?>index.php" class="navbar-brand"><i class="fa-solid fa-house-laptop me-2"></i> TECH AERO</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user-group"></i> Gerentes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>gerentes"><i class="fa-solid fa-user-group"></i> Gerenciar Gerentes</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>gerentes/add.php"><i class="fa-solid fa-user-plus"></i> Novo Gerente</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid">