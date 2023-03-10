<?php
    include_once('../model/Monitore.php');

    class MonitoreController{
        function getMonitores(){
            $monitores = new Monitore();
            return json_encode($monitores->getMonitores());
        }

        function getMonitore($post){
            $id = $post['id'];
            $monitore = (new Monitore())->getMonitore($id);
            if($monitore["id"] > 0){
                return json_encode([
                    "access" => true,
                    "monitore" => $monitore,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Usuario não encontrado"
                ]);
            }
        }

        function criarMonitore($post){
            if (isset($post['nome'])
                && $post['nome'] != ""
                && isset($post['usuario'])
                && $post['usuario'] != ""
                && isset($post['senha'])
                && $post['senha'] != ""
            ){
                $monitore = new Monitore();
                $monitore->nome = $post['nome'];
                $monitore->usuario = $post['usuario'];
                $monitore->senha = $post['senha'];
                $id = $monitore->criarMonitore();
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

        function salvarMonitore($post){
            if (isset($post['id'])
                && $post['id'] != ""
                && isset($post['nome'])
                && $post['nome'] != ""
                && isset($post['usuario'])
                && $post['usuario'] != ""
                && isset($post['senha'])
                && $post['senha'] != ""
            ){
                $comissao = new Monitore();
                $comissao->nome = $post['nome'];
                $comissao->usuario = $post['usuario'];
                $comissao->senha = $post['senha'];
                $comissao->salvarMonitore($post['id']);
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

        function excluirMonitore($post){
            if (isset($post['id'])
                && $post['id'] != ""
            ){
                $monitore = new Monitore();
                $monitore->id = $post['id'];
                $excluido = $monitore->excluir();
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