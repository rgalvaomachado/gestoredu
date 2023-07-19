<?php

    class RouterController{
        function getURL(){
            $uri = $_SERVER["REQUEST_URI"];
            $parametros = explode('/',$uri);
            unset($parametros[0]);
            $parametros = array_values($parametros);
            return implode('/',$parametros);
        }

        function path($url, $routes){
            $url = explode('?',$url);
            unset($url[1]);
            $url = implode('',$url);
    
            if(is_file($url)){
                return $url;
            }
    
            $public_url = "public/".$url;
            
            if(is_file($public_url)){
                return $public_url;
            }
    
            if (!isset($_SESSION['modo']) || $_SESSION['modo'] == ''){
                $url = "login";
            }
    
            if ($url == ""){
                $url = "home";
            }
    
            echo '<head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>GestorEdu</title>
                    <link rel="icon" href="/public/img/icon.png">
                    <script src="/public/js/jquery-1.11.1.min.js"></script>
                    <script src="/public/js/md5.js"></script>
                    <link href="/public/css/global.css" rel="stylesheet">
                    </head>
                ';
    
            foreach($routes as $route){
                $RoutePath = $route[0];
                $RouteView = $route[1];
                if ($url == $RoutePath){
                    return $RouteView;
                }
            }
        }

        function run($routes){
            $url = $this->getURL();
            $path = $this->path($url, $routes);
            if($path){
                include_once $path;
            } else {
                include_once ('404.html');
            }
        }
    }