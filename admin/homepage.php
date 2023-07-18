<?php
session_start();
include("db_connection.php");

if ($_SESSION["enter"] != sha1(md5("var")) || $_COOKIE["user"] != "msb") {
    header("Location: exit.php");
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Admin Panel - Homepage</title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>
        <!-- Collapsible wrapper -->
        <div class="d-flex align-items-center">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="homepage.php">
                <img
                    src="../assets/img/logo.ico"
                    height="50"
                    alt="MDB Logo"
                    loading="lazy"
                />
                <span>EDG Blog</span>
            </a>

        </div>
        <div class="d-flex flex-row align-items-center">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="homepage.php">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="portfolio.php">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="projects.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="exit.php"
                       onclick="if (!confirm('Are you sure do you want to log out from admin panel?')) return false;">Log
                        out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar -->

<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>