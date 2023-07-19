<?php
session_start();
include("db_connection.php");

if ($_SESSION["enter"] != sha1(md5("var")) || $_COOKIE["user"] != "msb") {
    header("Location: exit.php");
}


if (isset($_GET["process"])) {
    $process = $_GET["process"];
    if ($process == "remove") {
        $id = $_GET["id"];
        $query = $connect->query("delete from portfolio where (id='$id')");
        echo "<script> window.location.href='portfolio.php'; </script>";
    }

    if ($process == "add") {
        $title = $_POST["title"];
        $image = "../assets/img/" . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], "../" . $image);
        $query = $connect->query("insert into portfolio (title,image) values ('$title','$image')");
        echo "<script> window.location.href='portfolio.php'; </script>";
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="shortcut icon" href="../assets/img/admin.ico" type="image/x-icon">
    <title>Admin Panel - Portfolio</title>
</head>
<body style="text-align:center;">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="homepage.php">
            <img
                src="../assets/img/logo.ico"
                height="50"
                alt="EDG Logo"
                loading="lazy"
            />
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
                    <a class="nav-link active" href="portfolio.php">Portfolio</a>
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
                        out <span><i class="fas fa-circle-arrow-right"></i></span></a>
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

<form class="admin-form" action="portfolio.php?process=add" enctype="multipart/form-data" method="post">
    <b>Title:</b>
    <input type="text" size="20" name="title">
    <br>
    <b>Image:</b>
    <input style="margin-left: 210px; margin-top: 10px" type="file" name="image">
    <br>
    <div><input class="btn btn-success" type="submit" value="Save"></div>
</form>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>