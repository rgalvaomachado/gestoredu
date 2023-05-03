<?php
    include_once(dirname(__FILE__).'/../model/Usuario.php');

    class UsuarioController{
        function buscarTodos($post = []){
            $usuario = new Usuario();
            if(!empty($post['grupo'])){
                $usuario->grupos = $post['grupo'];
            }
            if(!empty($post['disciplina'])){
                $usuario->disciplinas = $post['disciplina'];
            }
            if(!empty($post['sala'])){
                $usuario->salas = $post['sala'];
            }
            $usuarios = $usuario->buscarTodos();
            return json_encode([
                "access" => true,
                "usuarios" => $usuarios
            ]);
        }
        
        function buscar($post){
            $user = new Usuario();
            $user->id = $post['id'];
            $usuario = $user->buscar();
            if(!empty($usuario)){
                return json_encode([
                    "access" => true,
                    "usuario" => $usuario,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Usuario não encontrado"
                ]);
            }
        }

        function criar($post){
            $usuario = new Usuario();
            $usuario->nome = $post['nome'];
            $usuario->email = $post['email'];
            $usuario->senha = $post['senha'];
            if(!empty($post['grupos'])){
                $usuario->grupos = '#'.implode("#", $post['grupos']).'#';
            }
            if(!empty($post['disciplinas'])){
                $usuario->disciplinas = '#'.implode("#", $post['disciplinas']).'#';
            }
            if(!empty($post['salas'])){
                $usuario->salas = '#'.implode("#", $post['salas']).'#';
            }
            $id = $usuario->criar();
            if ($id > 0){
                return json_encode([
                    "access" => true,
                    "message" => "Criado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro no cadastro"
                ]);
            }
            
        }

        function editar($post){
            $usuario = new Usuario();
            $usuario->id = $post['id'];
            $usuario->nome = $post['nome'];
            $usuario->email = $post['email'];
            $usuario->senha = $post['senha'];
            if(!empty($post['grupos'])){
                $usuario->grupos = '#'.implode("#", $post['grupos']).'#';
            }
            if(!empty($post['disciplinas'])){
                $usuario->disciplinas = '#'.implode("#", $post['disciplinas']).'#';
            }
            if(!empty($post['salas'])){
                $usuario->salas = '#'.implode("#", $post['salas']).'#';
            }
            $id = $usuario->editar();
            if ($id > 0){
                return json_encode([
                    "access" => true,
                    "message" => "Editado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro na Edição"
                ]);
            }
        }

        function deletar($post){
            $disciplina = new Usuario();
            $disciplina->id = $post['id'];
            $deletado = $disciplina->deletar();
            if ($deletado){
                return json_encode([
                    "access" => true,
                    "message" => "Deletado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro na deleção"
                ]);
            } 
        }
    }
?>