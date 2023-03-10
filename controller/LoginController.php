<?php
include_once('MonitoreController.php');
include_once('RepresentanteController.php');
include_once('ComissaoController.php');

class LoginController{
    function login($post){
        $usuario = $post['usuario'];
        $senha = $post['senha'];
        $validado = false;

        $RepresentanteController = new RepresentanteController();
        $representantes = json_decode($RepresentanteController->getRepresentantes());
        foreach($representantes as $representate){
            if($usuario == $representate->usuario && $senha == $representate->senha){
                $usuarioValidado = $representate->usuario;
                $modoValidado = 'representante';
                $validado = true;
            }
        }
        $ComissaoController = new ComissaoController();
        $comissoes = json_decode($ComissaoController->getComissoes());
        foreach($comissoes as $comissao){
            if($usuario == $comissao->usuario && $senha == $comissao->senha){
                $usuarioValidado = $comissao->usuario;
                $modoValidado = 'comissao';
                $validado = true;
            }
        }

        $MonitoreController = new MonitoreController();
        $monitores = json_decode($MonitoreController->getMonitores());
        foreach($monitores as $monitore){
            if($usuario == $monitore->usuario && $senha == $monitore->senha){
                $usuarioValidado = $monitore->usuario;
                $modoValidado = 'monitore';
                $validado = true;
            }
        }

        if($validado){
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['usuario'] =  $usuarioValidado;
            $_SESSION['modo'] = $modoValidado;
            $_SESSION['CREATED'] = time();
            return json_encode([
                "access" => true,
                "modo" => $modoValidado,
            ]);
        }else{
            return json_encode([
                "access" => false,
                "message" => "Usuário ou senha incorreta",
            ]);
        }
    }

    function logout(){
	    if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['usuario'] =  "";
        $_SESSION['modo'] = "";
        session_destroy();
        return json_encode([
            "access" => true
        ]);
    }

    function verificaLogin(){
        if(!isset($_SESSION)){
            session_start();
        }
        $modo = isset($_SESSION['modo']) ? $_SESSION['modo'] : "";
        if ($modo != '') {
            return json_encode([
                "modo" => $modo,
                "access" => true
            ]);
        } else {
            return json_encode([
                "access" => false
            ]);
        }
    }

    function verificaSessão(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (time() - $_SESSION['CREATED'] > 1800) { // 30 minutos 
            $_SESSION['usuario'] =  "";
            $_SESSION['modo'] = "";
            session_destroy();
            return json_encode([
                "access" => false
            ]);
        } else {
            $_SESSION['CREATED'] = time();
            return json_encode([
                "access" => true
            ]);
        }
    }
}
?>