<?php
    include_once('../model/Sala.php');

    class SalaController{
        function getSalas(){
            $salas = new Sala();
            return json_encode($salas->getSalas());
        }

        function getSala($post){
            $id = $post['id'];
            $sala = (new Sala())->getSala($id);
            if($sala["id"] > 0){
                return json_encode([
                    "access" => true,
                    "sala" => $sala,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Usuario não encontrado"
                ]);
            }
        }

        function criarSala($post){
            if (isset($post['nome'])
                && $post['nome'] != ""
            ){
                $sala = new Sala();
                $sala->nome = $post['nome'];
                $id = $sala->criar();
                return json_encode([
                    "access" => true,
                    "message" => "Cadastrado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function salvarSala($post){
            if (isset($post['id'])
                && $post['id'] != ""
                && isset($post['nome'])
                && $post['nome'] != ""
            ){
                $sala = new Sala();
                $sala->nome = $post['nome'];
                $sala->salvar($post['id']);
                return json_encode([
                    "access" => true,
                    "message" => "Editado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function excluirSala($post){
            if (isset($post['id'])
                && $post['id'] != ""
            ){
                $sala = new Sala();
                $sala->id = $post['id'];
                $excluido = $sala->excluir();
                if ($excluido){
                    return json_encode([
                        "access" => true,
                        "message" => "Excluido com sucesso"
                    ]);
                } else {
                    return json_encode([
                        "access" => false,
                        "message" => "Não excluido"
                    ]);
                } 
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            } 
        }
    }
?>