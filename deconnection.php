<?php
session_start();

unset($_SESSION["personnelle"], $_SESSION["admin"]);
//session_destroy();
header("location:index.php");
exit();

?>