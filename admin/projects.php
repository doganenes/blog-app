<?php
session_start();
include("db_connection.php");
if ($_SESSION["enter"] != sha1(md5("var")) || $_COOKIE["user"] != "msb") {
    header("Location: exit.php");
}

if ($_POST) {
    $description = $_POST["description"];
    $query = $connect->query("delete from projects");
    $query = $connect->query("insert into projects (description) values ('$description')");
    if ($query) {
        echo "<script>window.location.href = 'projects.php';</script>";
    } else {
        echo "<script>alert('Error - Register is failed!'); window.location.href = 'projects.php';</script>";
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
    <meta http-equiv="X-UA-Compatible" content="ie=processe">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="shortcut icon" href="../assets/img/admin.ico" type="image/x-icon">
    <title>Admin Panel - Projects</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="homepage.php">
            <img src="../assets/img/logo.ico" height="50" alt="EDG Logo" loading="lazy"/>
            <span>EDG Blog/Admin</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                    <a class="nav-link active" href="projects.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="exit.php"
                       onclick="if (!confirm('Are you sure you want to log out?')) return false;">Log
                        out <span><i class="fas fa-circle-arrow-right"></i></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<form class="admin-form" action="" method="post">
    <h2>Content:</h2>
    <textarea style="width: 50%;height: 200px;" name="description">
        <?php
        if (!empty($row->description)) {
            echo $row->description;
        }
        ?>
    </textarea>
    <br>
    <input class="btn btn-success" type="submit" value="Save">
</form>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>