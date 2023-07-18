<?php
session_start();
include("db_connection.php");

if ($_SESSION["enter"] != sha1(md5("var")) || $_COOKIE["user"] != "msb") {
    header("Location: exit.php");
}

$process = $_GET["process"];

if ($process == "remove") {
    $id = $_GET["id"];
    $query = $connect->query("delete from portfolio where (id='$id')");
    echo "<script> window.location.href='portfolio.php'; </script>";
}

if ($process == "add") {
    $title = $_POST["title"];
    $image = "img/" . $_FILES["image"][name];
    move_uploaded_file($_FILES["image"][tmp_name], $image);
    $query = $connect->query("insert into portfolio (title,image) values ('$title','$image')");
    echo "<script> window.location.href='portfolio.php'; </script>";
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../assets/img/admin.ico" type="image/x-icon">
    <title>Admin Panel - Portfolio</title>
</head>
<body style="text-align:center;">
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
        <div class="d-flex align-items-center">
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
<table width="100%" border="1">
    <tr align="center">
        <th>Order</th>
        <th>Title</th>
        <th>Remove</th>
    </tr>
    <?php
    $order = 0;
    $query = $connect->query("select * from portfolio");
    while ($row = $query->fetch_object()) {
        $order++;
        echo "<tr align='center'>
                <td>$order</td>
                <td>$row->title</td>
                <td><a href='portfolio.php?process=remove&id=$row->id'>remove</td>
                </tr>";
    }
    ?>
</table>
<br><br>

<form action="portfolio.php?process=add" enctype="multipart/form-data" method="post">
    <b>Title:</b><input type="text" size="20" name="title">
    <b>Image:</b><input type="file" name="image">
    <input type="submit" value="Save">
</form>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>