<?php
    include_once('../model/Alune.php');
    include_once('PresencaController.php');
    
    class AluneController{
        function getAlunes(){
            $alunes = new Alune();
            return json_encode($alunes->getAlunes());

        }

        function getAlune($post){
            $id = $post['id'];
            $alune = (new Alune())->getAlune($id);
            if($alune["id"] > 0){
                return json_encode([
                    "access" => true,
                    "alune" => $alune,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Usuario não encontrado"
                ]);
            }
        }

        function getAlunesSala($post){
            if (isset($post['sala'])
                && $post['sala'] != ""
            ){
                $alunes = new Alune();
                $alunes->sala = $post['sala'];
                $getAlunesSala = $alunes->getAlunesSala();
                return json_encode([
                    "access" => true,
                    "alunes" => $getAlunesSala,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function criarAlune($post){
            if (isset($post['nome'])
                && $post['nome'] != ""
                && isset($post['sala'])
                && $post['sala'] != ""
            ){
                $alune = new Alune();
                $alune->nome = $post['nome'];
                $alune->sala = $post['sala'];
                $id = $alune->criar();
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

        function salvarAlune($post){
            if (isset($post['id'])
                && $post['id'] != ""
                && isset($post['nome'])
                && $post['nome'] != ""
                && isset($post['sala'])
                && $post['sala'] != ""
            ){
                $alune = new Alune();
                $alune->nome = $post['nome'];
                $alune->sala = $post['sala'];
                $alune->salvar($post['id']);
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

        function excluirAlune($post){
            if (isset($post['id'])
                && $post['id'] != ""
            ){
                $alune = new Alune();
                $alune->id = $post['id'];
                $excluido = $alune->excluir();
                if ($excluido){
                    $presenca = new PresencaController();
                    $presenca->deletaPresencaAlune($post['id']);
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