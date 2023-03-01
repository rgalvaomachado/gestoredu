<?php
include_once('monitore.php');
include_once('representante.php');
include_once('comissao.php');

class LoginController{
    function login($post){
        $usuario = $post['usuario'];
        $senha = $post['senha'];
        $validado = false;

        $RepresentanteController = new RepresentanteController();
        $representates = $RepresentanteController->getRepresentantes();
        foreach($representates as $representate){
            if($usuario == $representate['usuario'] && $senha == $representate['senha']){
                $usuarioValidado = $representate['usuario'];
                $modoValidado = 'representate';
                $validado = true;
            }
        }

        $ComissaoController = new ComissaoController();
        $comissoes = $ComissaoController->getComissoes();
        foreach($comissoes as $comissao){
            if($usuario == $comissao['usuario'] && $senha == $comissao['senha']){
                $usuarioValidado = $comissao['usuario'];
                $modoValidado = 'comissao';
                $validado = true;
            }
        }

        $MonitoreController = new MonitoreController();
        $monitores = $MonitoreController->getMonitores();
        foreach($monitores as $monitore){
            if($usuario == $monitore['usuario'] && $senha == $monitore['senha']){
                $usuarioValidado = $monitore['usuario'];
                $modoValidado = 'monitore';
                $validado = true;
            }
        }

        if($validado){
            session_start();
            $_SESSION['usuario'] =  $usuarioValidado;
            $_SESSION['modo'] = $modoValidado;
            echo json_encode([
                "redirect" => "home.php"
            ]);
        }else{
            echo json_encode([
                "redirect" => "login.php?error=1"
            ]);
        }
    }

    function logout(){
        session_start();
        $_SESSION['usuario'] =  "";
        $_SESSION['modo'] = "";
        session_destroy();
        echo json_encode([
            "redirect" => "login.php"
        ]);
    }
}
?>