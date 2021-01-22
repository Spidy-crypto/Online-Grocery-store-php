<?php
    session_start();
    $_SESSION['search'] = "true";
    header("location:home.php");
?>