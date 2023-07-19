<?php
    include_once('env.php');
    include_once('controller/RouterController.php');

    if (!session_start()) {
        session_start();
    }

    $Router = new RouterController();
    $url = $Router->getURL();
    $path = $Router->path($url);
    if($path){
        include_once $path;
    } else {
        include_once ('404.html');
    }

?>