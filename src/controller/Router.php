<?php
    include_once('DisciplinaController.php');
    include_once('LoginController.php');
    include_once('PresencaController.php');
    include_once('SalaController.php');
    include_once('HorarioController.php');
    include_once('RelatorioController.php');
    include_once('CertificadoController.php');
    include_once('UsuarioController.php');
    include_once('GrupoController.php');
    include_once('ConfiguracaoController.php');

    class Router{

        private $url;
        private $method;
        private $data;
        private $token;

        function __construct() {
            $this->url = $_SERVER["REQUEST_URI"];
            $this->method = $_SERVER["REQUEST_METHOD"];     //GET, POST, PUT, DELETE.
            $this->data = $this->getData();
            $this->token = $this->getToken();
        }

        function checkApi(){
            $uri = $this->url;
            if (strpos($uri, '/api/') === false) {
                return false;
            }
            return true;
        }

        function getToken(){
            $header = getallheaders();
            $token = isset($header['token']) ? $header['token'] : null;
            return $token;
        }

        function getData(){
            $contents = file_get_contents('php://input');
            $input = [];
            if (isset($contents)){
                $input = (array) json_decode($contents);
            }
            return $input;
        }

        function pathApi(){
            $url = $this->url;
            $apiPart = substr($url, strpos($url, '/api/') + 5);
            $apiPart = explode('?', $apiPart);
            $endpoint = $apiPart[0];
            $queryString = isset($apiPart[1]) ? $apiPart[1] : "";

            if ($queryString != "") {
                $paramsArray = explode('&', $queryString);
                $params = [];
                foreach ($paramsArray as $param) {
                    $param = explode('=', $param);
                    $name = $param[0];
                    $value = $param[1];
                    $params[$name] = $value;
                }
                $this->data = array_merge($this->data, $params);
            }

            return '/'.$endpoint;
        }

        function runApi($routes){
            $path = $this->pathApi();

            foreach($routes as $route){
                $RouteMethod = $route[0];
                $RoutePath = $route[1];
                $RouteClass = $route[2];
                $RouteFunction = $route[3];
                if ($RouteMethod == $this->method && $RoutePath == $path){
                    $Class = new $RouteClass();
                    if (method_exists($Class,$RouteFunction)){
                        http_response_code(200);
                        echo $Class->$RouteFunction($this->data, $this->token);
                        break;
                    } else {
                        http_response_code(405);
                        break;
                    }
                } else {
                    http_response_code(405);
                }
            }
        }

        function pathWeb($url, $routes){
            $url = explode('?',$url);
            unset($url[1]);
            $url = implode('',$url);

            if(is_file($url)){
                return $url;
            }

            if(is_file("public/".$url)){
                return "public/".$url;
            }

            if (file_exists('public/head.php')) {
                include_once('public/head.php');
            }

            $url = '/'.$url;
            
            if (!isset($_SESSION['logado']) || $_SESSION['logado'] == false){
                $url = "/login";
            }

            if ($url == "" && isset($_SESSION['modo']) && $_SESSION['modo'] == 'admin'){
                header('Location: admin/home');
            }

            if ($url == "/"){
                $url = "/home";
            }

            if ($url == "/admin" && isset($_SESSION['modo']) && $_SESSION['modo'] == 'admin'){
                $url = "/admin/home";
            } elseif ($url == "" && isset($_SESSION['modo']) && $_SESSION['modo'] == 'usuario' ){
                $url = "/home";
            }

            foreach($routes as $route){
                $RoutePath = $route[0];
                $RouteWeb = 'public/view'.$route[1];
                if ($url == $RoutePath){
                    return $RouteWeb;
                }
            }

            return '404.html';
        }

        function runWeb($routes){
            $uri = $this->url;
            $parametros = explode('/',$uri);
            unset($parametros[0]);
            $parametros = array_values($parametros);
            $url = implode('/',$parametros);

            $path = $this->pathWeb($url, $routes);
            if(isset($path)){
                $extension = substr($path, -3);
                if ($extension == 'png'){
                    $c = file_get_contents($path,true);
                    $size = filesize($path);
                    header ('Content-Type: image/png');
                    header ("Content-length: $size");
                    echo $c;
                } else if ($extension == 'gif'){
                    $c = file_get_contents($path,true);
                    $size = filesize($path);
                    header ('Content-Type: image/gif');
                    header ("Content-length: $size");
                    echo $c;
                }else{
                    include_once $path;
                }
            }
        }
    }
?>