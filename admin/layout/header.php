<?php
session_start();
define("ADMINURL", "http://localhost:8080/nikestravel/admin");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Pannel</title>
    <link rel="stylesheet" href="<?php echo ADMINURL; ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo ADMINURL; ?>/assets/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="<?php echo ADMINURL; ?>/assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>

<body>
    <!--Navbar iteme-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand ms-2 fs-3 fw-3" href="#"> NikesTravel ADMIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-5">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo ADMINURL; ?>/index.php"> Home </a>
                    </li>
                    <?php if (isset($_SESSION['adminname'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo ADMINURL; ?>/admins/admins.php"> Admin </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo ADMINURL; ?>/bookings-admins/show-bookings.php"> Booking </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMINURL; ?>/countries-admins/show-country.php"> Countries </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMINURL; ?>/cities-admins/show-cities.php"> cities </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (!isset($_SESSION['adminname'])) : ?>
                    <ul class="navbar-nav ms-auto me-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                <li><a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/login-admins.php"> Login</a></li>
                                <li><a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/create-admins.php"> Resister</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php elseif(isset($_SESSION['adminname'])) : ?>
                    <ul class="navbar-nav ms-auto me-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             <?php echo $_SESSION['adminname']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                <li><a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/logout-admins.php"> Logout </a></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>


            </div>
        </div>
    </nav>