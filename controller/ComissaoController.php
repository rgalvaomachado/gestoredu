<?php
    include_once('../model/Comissao.php');

    class ComissaoController{
        function getComissoes(){
            $comissoes = new Comissao();
            return json_encode($comissoes->getComissoes());
        }

        function getComissao($post){
            $id = $post['id'];
            $comissao = (new Comissao())->getComissao($id);
            if($comissao["id"] > 0){
                return json_encode([
                    "access" => true,
                    "comissao" => $comissao,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Usuario não encontrado"
                ]);
            }
        }

        function criarComissao($post){
            if (isset($post['nome'])
                && $post['nome'] != ""
                && isset($post['usuario'])
                && $post['usuario'] != ""
                && isset($post['senha'])
                && $post['senha'] != ""
            ){
                $comissao = new Comissao();
                $comissao->nome = $post['nome'];
                $comissao->usuario = $post['usuario'];
                $comissao->senha = $post['senha'];
                $id = $comissao->criar();
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

        function salvarComissao($post){
            if (isset($post['id'])
                && $post['id'] != ""
                && isset($post['nome'])
                && $post['nome'] != ""
                && isset($post['usuario'])
                && $post['usuario'] != ""
                && isset($post['senha'])
                && $post['senha'] != ""
            ){
                $comissao = new Comissao();
                $comissao->nome = $post['nome'];
                $comissao->usuario = $post['usuario'];
                $comissao->senha = $post['senha'];
                $comissao->salvar($post['id']);
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

        function excluirComissao($post){
            if (isset($post['id'])
                && $post['id'] != ""
            ){
                $comissao = new Comissao();
                $comissao->id = $post['id'];
                $excluido = $comissao->excluir();
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