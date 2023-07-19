<?php

    class RouterController{
        function getURL(){
            $uri = $_SERVER["REQUEST_URI"];
            $parametros = explode('/',$uri);
            unset($parametros[0]);
            $parametros = array_values($parametros);
            return implode('/',$parametros);
        }

        function path($url){
            $url = explode('?',$url);
            unset($url[1]);
            $url = implode('',$url);
    
            if(is_file($url)){
                return $url;
            }
    
            $public_url = "public/".$url;
            // echo $public_url;
            
            if(is_file($public_url)){
                return $public_url;
            }
    
            if (!isset($_SESSION['modo']) || $_SESSION['modo'] == ''){
                $public_url = "public/login";
            }
    
            if ($public_url == "public/"){
                $public_url = "public/home";
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
    
            if(is_file($public_url.'/index.php')){
                return $public_url.'/index.php';
            }
    
            if(is_file($public_url.'.php')){
                return $public_url.'.php';
            }
            
        }
    }