<?php
session_destroy();
setcookie("user", time() - 1);
echo "<script>window.location.href='index.php';</script>";