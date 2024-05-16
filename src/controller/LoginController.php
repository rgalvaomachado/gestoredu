<?php
include_once('UsuarioController.php');

class LoginController{
    function login($post){
        $email = $post['email'];
        $senha = base64_encode($post['senha']);
        $validado = false;

        $UsuarioController = new UsuarioController();
        $UsuarioController = json_decode($UsuarioController->buscarTodos());
        $usuarios = $UsuarioController->usuarios;
        foreach($usuarios as $usuario){
            if($email == $usuario->email && $senha == $usuario->senha){
                $usuarioValidado = $usuario->nome;
                $modoValidado = 'representante';
                $validado = true;
            }
        }

        if($validado){
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['usuario'] =  $usuarioValidado;
            $_SESSION['modo'] = $modoValidado;
            $_SESSION['logado'] = $validado;
            $_SESSION['CREATED'] = time();
            return json_encode([
                "access" => true,
                "modo" => $modoValidado,
            ]);
        }else{
            return json_encode([
                "access" => false,
                "message" => "Desculpe, usuário ou senha incorreta.",
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

    function primeiroLogin(){
        $UsuarioController = new UsuarioController();
        $response = json_decode($UsuarioController->buscarTodos());
        return count($response->usuarios) == 0 ? true : false;
    }
}
?>