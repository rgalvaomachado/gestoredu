<?php
    include_once('../model/Representante.php');

    class RepresentanteController{
        function getRepresentantes(){
            $representantes = new Representante(); 
            return json_encode($representantes->getRepresentantes());
        }

        function getRepresentante($post){
            $id = $post['id'];
            $representante = (new Representante())->getRepresentante($id);
            if($representante["id"] > 0){
                return json_encode([
                    "access" => true,
                    "representante" => $representante,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Usuario não encontrado"
                ]);
            }
        }

        function criarRepresentante($post, $files){
            if (isset($post['nome'])
                && $post['nome'] != ""
                && isset($post['usuario'])
                && $post['usuario'] != ""
                && isset($post['senha'])
                && $post['senha'] != ""
            ){
                $representante = new Representante();
                $representante->nome = $post['nome'];
                $representante->usuario = $post['usuario'];
                $representante->senha = $post['senha'];
                $id = $representante->criarRepresentante();
                return json_encode([
                    "access" => true,
                    "id" => $id,
                    "message" => "Cadastrado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function salvarRepresentante($post, $files){
            if (isset($post['id'])
                && $post['id'] != ""
                && isset($post['nome'])
                && $post['nome'] != ""
                && isset($post['usuario'])
                && $post['usuario'] != ""
                && isset($post['senha'])
                && $post['senha'] != ""
            ){
                $representante = new Representante();
                $representante->nome = $post['nome'];
                $representante->usuario = $post['usuario'];
                $representante->senha = $post['senha'];
                $representante->salvarRepresentante($post['id']);
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

        function excluirRepresentante($post){
            if (isset($post['id'])
                && $post['id'] != ""
            ){
                $representante = new Representante();
                $representante->id = $post['id'];
                $excluido = $representante->excluir();
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

        function salvaAssinaturaRepresentante($post){
            $representante = new Representante();
            $representante->assinatura = $post['assinatura'];
            $representante->salvarAssinatura($post['id']);
            return json_encode([
                "access" => true,
            ]);
        }
    }
?>