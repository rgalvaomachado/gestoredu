<?php
    session_start();
    if (isset($_SESSION['modo']) && $_SESSION['modo'] != ''){
        header("Location: home/index.php");
        die();
    } else {
        header("Location: logon/login.php");
        die();
    }
?>