<?php
session_start();
session_unset();
session_destroy();
setcookie("user", time() - 1);
echo "<script>window.location.href='index.php';</script>";