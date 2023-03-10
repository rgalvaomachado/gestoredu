<?php
    include_once('../model/Tutore.php');

    class TutoreController{
        function getTutores(){
            $tutores = new Tutore();
            return json_encode($tutores->getTutores());
        }

        function getTutore($post){
            $id = $post['id'];
            $tutore = (new Tutore())->getTutore($id);
            if($tutore["id"] > 0){
                return json_encode([
                    "access" => true,
                    "tutore" => $tutore,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Usuario não encontrado"
                ]);
            }
        }

        function criarTutore($post){
            if (isset($post['nome'])
                && $post['nome'] != ""
                && isset($post['disciplina'])
                && $post['disciplina'] != ""
            ){
                $tutore = new Tutore();
                $tutore->nome = $post['nome'];
                $tutore->disciplina = $post['disciplina'];
                $id = $tutore->criar();
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

        function salvarTutore($post){
            if (isset($post['id'])
                && $post['id'] != ""
                && isset($post['nome'])
                && $post['nome'] != ""
                && isset($post['disciplina'])
                && $post['disciplina'] != ""
            ){
                $tutore = new Tutore();
                $tutore->nome = $post['nome'];
                $tutore->disciplina = $post['disciplina'];
                $tutore->salvar($post['id']);
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

        function excluirTutore($post){
            if (isset($post['id'])
                && $post['id'] != ""
            ){
                $tutore = new Tutore();
                $tutore->id = $post['id'];
                $excluido = $tutore->excluir();
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