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

        $query = $connect->query("SELECT image FROM portfolio WHERE id='$id'");
        if ($query) {
            $row = $query->fetch_assoc();
            $imageFileName = $row["image"];
            $query = $connect->query("DELETE FROM portfolio WHERE id='$id'");

            $imagePath = __DIR__ . "/../assets/img/" . $imageFileName;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            echo "<script> window.location.href='portfolio.php'; </script>";
        } else {
            echo "An error occurred.";
        }
    }


    if ($process == "add") {
        $title = $_POST["title"];

        $imageExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $FileName = $title . '.' . $imageExtension;

        $imagePath = "../assets/img/" . $FileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            $query = $connect->query("INSERT INTO portfolio (title, image) VALUES ('$title', '$FileName')");
            echo "<script>window.location.href='portfolio.php';</script>";
        } else {
            echo "An error occurred while image uploading.";
        }
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
                       onclick="if (!confirm('Are you sure you want to log out?')) return false;">Log
                        out <span><i class="fas fa-circle-arrow-right"></i></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<table class="table w-100">
    <tr>
        <th class='text-center'>Order</th>
        <th class='text-center'>Title</th>
        <th class='text-center'>Remove</th>
    </tr>
    <?php
    $order = 0;
    $query = $connect->query("select * from portfolio");
    while ($row = $query->fetch_object()) {
        $order++;
        echo "<tr>
                <td class='text-center'>$order</td>
                <td class='text-center'>$row->title</td>
                <td class='text-center'><a href='portfolio.php?process=remove&id=$row->id'>remove</td>
                </tr>";
    }
    ?>
</table>
<br><br>

<form class="admin-form" action="portfolio.php?process=add" enctype="multipart/form-data" method="post">
    <b>Title:</b>
    <input type="text" size="20" name="title" required>
    <br>
    <b>Image:</b>
    <input style="margin-left: 210px; margin-top: 10px" type="file" name="image">
    <br>
    <div><input class="btn btn-success" type="submit" value="Save"></div>
</form>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>