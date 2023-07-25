<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>404 Not Found</title>
    <style>
        body {
            text-align: center;
            margin-top: 50px;
        }

        .dots-animation:after {
            content: "...";
            animation: dots 1.5s infinite;
        }

        @keyframes dots {
            0%, 20% {
                content: ".";
            }
            40% {
                content: "..";
            }
            60% {
                content: "...";
            }
            80%, 100% {
                content: "";
            }
        }
    </style>
</head>
<body>
<h1>404 Not Found</h1>
<p>Sorry, the page you are looking for could not be found.</p>
<p>You are being redirected to the homepage<span class="dots-animation"></span></p>
<?php
header("refresh: 3; url=index.php");
?>
</body>
</html>
