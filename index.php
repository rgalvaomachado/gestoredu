<?php
    include_once('env.php');
    include_once('controller/RouterController.php');
    include_once('routes.php');

    if (!session_start()) {
        session_start();
    }

    $Router = new RouterController();
    $path = $Router->run($routesView);
?>