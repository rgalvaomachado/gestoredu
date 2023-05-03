<?php
    include_once(dirname(__FILE__).'/../model/Sala.php');
    include_once(dirname(__FILE__).'/../model/Usuario.php');

    class SalaController{
        function buscarTodos(){
            $Sala = new Sala();
            $Salas = $Sala->buscarTodos();
            return json_encode([
                "access" => true,
                "salas" => $Salas
            ]);
        }

        function buscar($post){
            $Sala = new Sala();
            $Sala->id = $post['id'];
            $buscarSala = $Sala->buscar();

            $usuario = new Usuario();
            $usuario->salas = $post['id'];
            $usuarios = $usuario->buscarUsuariosSala();
            $buscarSala['usuarios'] = $usuarios;

            if(!empty($buscarSala)){
                return json_encode([
                    "access" => true,
                    "sala" => $buscarSala,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Sala não encontrado"
                ]);
            }
        }

        function criar($post){
            $Sala = new Sala();
            $Sala->nome = $post['nome'];

            $id = $Sala->criar();
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
            $Sala = new Sala();
            $Sala->id = $post['id'];
            $Sala->nome = $post['nome'];
            $id = $Sala->editar();
            if ($id > 0) {
                return json_encode([
                    "access" => true,
                    "message" => "Editado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro na edição"
                ]);
            }
        }

        function deletar($post){
            $Sala = new Sala();
            $Sala->id = $post['id'];
            $deletado = $Sala->deletar();
            if ($deletado){
                return json_encode([
                    "access" => true,
                    "message" => "Deletado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro na exclusão"
                ]);
            }  
        }
    }
?>