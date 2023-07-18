<?php
session_destroy();
setcookie("user", time() - 1);
echo "<script>window.location.href='login.php';</script>";