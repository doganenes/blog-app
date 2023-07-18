<?php
session_start();
include("db_connection.php");
if ($_POST) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = $connect->query("SELECT * FROM USER WHERE (username='$username' && password='$password')");
    $recordUser = $query->num_rows;

    if ($recordUser > 0) {
        setcookie("user", "msb", time() + 60 * 60);
        $_SESSION["enter"] = sha1(md5("var"));
        echo "
<script>window.location.href = 'homepage.php'</script>";
    } else {
        echo "<script>alert('User not found!');
    window.location.href = 'index.php'</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Admin Panel</title>
</head>
<body style="text-align: center;">
<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Sign in</h3>
                        <div class="form-outline mb-4">
                            <form action="" method="post">
                                <input type="text" class="form-control form-control-lg" name="username" required/>
                                <label class="form-label" for="typeEmailX-2">Username</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" name="password" class="form-control form-control-lg"/>
                            <label class="form-label">Password</label>
                        </div>
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Login"/>
                        </form>
                        <hr class="my-4">

                        <button class="btn btn-lg text-light mb-2"
                                style="background-color: #dd4b39; min-width: 250px; max-width: 250px"
                                type="submit"><i class="fab fa-google me-2"></i> Sign in with Google
                        </button>
                        <button class="btn btn-lg text-light mb-2"
                                style="background-color: #3b5998; max-width: 250px; min-width: 250px;"
                                type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with Facebook
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
