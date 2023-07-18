<?php
include("admin/db_connection.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/jquery.fancybox-1.3.4.css">
    <link rel="shortcut icon" href="assets/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Blog App with Admin Panel</title>
</head>
<body>
<header>
    <a href="javascript:void(0);" onclick="open()" id="side-open">☰</a>
    <a href="javascript:void(0);" onclick="close()" id="side-close">☰</a>
</header>
<aside id="menu">
    <h1>EDG Blog</h1>
    <ul>
        <li><a href="#homepage">Homepage</a></li>
        <li><a href="#about_us">About Us</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</aside>
<main id="content">
    <section id="homepage">
        <h1>EDG Blog</h1>
        <h2>Portfolio</h2>
        <hr>
        <div class="clear"></div>
        <?php
        $query = $connect->query("select * from portfolio");
        while ($row = $query->fetch_object()) {
            $image = substr($row->image, 3);
            echo "<div class='gallery'><img class='gallery-image' src='$image' alt='$row->title' title='$row->title'></div> ";
        }
        ?>
        <div class="clear"></div>
    </section>

    <section id="about_us">
        <h2>about_us.</h2>
        <hr>
        <div class="clear"></div>
        <?php
        $query = $connect->query("SELECT * FROM about_us");
        $row = $query->fetch_object();
        echo $row->description;
        ?>
    </section>

    <section id="services">
        <h2>services.</h2>
        <hr>
        <?php
        $query = $connect->query("SELECT * FROM services");
        $row = $query->fetch_object();
        echo $row->description;
        ?>
    </section>

    <section id="projects">
        <h2>projects.</h2>
        <hr>
        <div class="clear"></div>
        <?php
        $query = $connect->query("select * from projects");
        $row = $query->fetch_object();
        echo $row->description;
        ?>
    </section>

    <section id="contact">
        <h2>Contact.</h2>
        <hr>
        <div class="clear"></div>
        <form method="post" opention="">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>

            <label for="tel">tel</label>
            <input type="tel" name="tel" id="tel">

            <label for="email">E-posta</label>
            <input type="email" name="email" id="email">

            <label for="message">Message</label>
            <textarea name="message" id="message"></textarea>

            <button type="submit">Send</button>
        </form>
    </section>

    <footer
    ">
    <p>Designed by <a href="https://www.github.com/doganenes" target="_blank">Enes Doğan</a></p>
    </footer>
</main>

<script src="js/jquery-1.4.3.min.js"></script>
<script src="js/jquery.fancybox-1.3.4.js"></script>

<script>
    $("a.images").fancybox();

    function open() {
        document.getElementById("menu").style.display = "block";
        document.getElementById("content").style.paddingLeft = "350px";
        document.getElementById("side-open").style.display = "none";
        document.getElementById("side-close").style.display = "block";
    }

    function close() {
        document.getElementById("menu").style.display = "none";
        document.getElementById("content").style.paddingLeft = "50px";
        document.getElementById("side-open").style.display = "block";
        document.getElementById("side-close").style.display = "none";
    }
</script>
</body>
</html>
