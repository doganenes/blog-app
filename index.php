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
    <link rel="shortcut icon" href="assets/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo rand(1000, 9999) ?>">
    <title>EDG Blog - Blog App with Admin Panel</title>
</head>
<body>
<header>
    <div class="menu-btn">
        <div class="menu-btn__burger"></div>
    </div>
</header>
<aside id="menu" class="asideTag">
    <h1 class="aside-title"><a class="aside-link" href="index.php">EDG Blog</a></h1>
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
        <h1>Welcome to EDG Blog Website!</h1>
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
        <h2>about us</h2>
        <hr>
        <br>
        <div class="clear"></div>
        <?php
        $query = $connect->query("SELECT * FROM about_us");
        $row = $query->fetch_object();
        echo $row->description;
        ?>
    </section>

    <section id="services">
        <h2>services</h2>
        <hr>
        <br>
        <?php
        $query = $connect->query("SELECT * FROM services");
        $row = $query->fetch_object();
        echo $row->description;
        ?>
    </section>

    <section id="projects">
        <h2>projects</h2>
        <hr>
        <br>
        <div class="clear"></div>
        <?php
        $query = $connect->query("SELECT * FROM projects");
        $row = $query->fetch_object();
        echo $row->description;
        ?>
    </section>

    <section id="contact">
        <h2>contact</h2>
        <hr>
        <br>
        <div class="clear"></div>
        <form method="post" opention="">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>

            <label for="tel">Tel</label>
            <input type="tel" name="tel" id="tel">

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">

            <label for="message">Message</label>
            <textarea name="message" id="message"></textarea>

            <button type="submit">Send</button>
        </form>
    </section>

    <footer>
        <p>Designed by <a style="margin-left: 5px;color: rebeccapurple;text-decoration: none"
                          href="https://www.github.com/doganenes" target="_blank">Enes Doğan</a></p>
    </footer>
</main>

<script src="js/jquery-1.4.3.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
