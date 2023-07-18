<?php
session_start();
include("db_connection.php");
if ($_SESSION["enter"] != sha1(md5("var")) && $_COOKIE["user"] != "msb") {
    header("Location:exit.php");
}

if ($_POST) {
    $description = $_POST["description"];
    $query = $connect->query("delete from projects");
    $query = $connect->query("insert into projects (description) values ('$description')");
    if ($query) {
        echo "<script>window.location.href = 'projects.php';</script>";
    }
}

$query = $connect->query("SELECT * FROM projects");
$row = $query->fetch_object();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/admin.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Admin Panel - Projects</title>
</head>
<body>
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
<form action="" method="post">
    <b>Content:</b>
    <br><br>
    <textarea id="summernote" style="width: 50%;height: 200px;" name="description">
        <?php
        echo $row->description;
        ?>
    </textarea><br><br>
    <input type="submit" value="Submit">
</form>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</body>
</html>