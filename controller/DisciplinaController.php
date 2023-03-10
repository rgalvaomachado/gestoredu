<?php
    include_once('../model/Disciplina.php');

    class DisciplinaController{
        function getDisciplinas(){
            $disciplinas = new Disciplina();
            return json_encode($disciplinas->getDisciplinas());
        }

        function getDisciplina($post){
            $id = $post['id'];
            $disciplina = (new Disciplina())->getDisciplina($id);
            if($disciplina["id"] > 0){
                return json_encode([
                    "access" => true,
                    "disciplina" => $disciplina,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Usuario não encontrado"
                ]);
            }
        }

        function criarDisciplina($post){
            if (isset($post['nome'])
                && $post['nome'] != ""
            ){
                $disciplina = new Disciplina();
                $disciplina->nome = $post['nome'];
                $id = $disciplina->criar();
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

        function salvarDisciplina($post){
            if (isset($post['id'])
                && $post['id'] != ""
                && isset($post['nome'])
                && $post['nome'] != ""
            ){
                $disciplina = new Disciplina();
                $disciplina->nome = $post['nome'];
                $disciplina->salvar($post['id']);
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

        function excluirDisciplina($post){
            if (isset($post['id'])
                && $post['id'] != ""
            ){
                $disciplina = new Disciplina();
                $disciplina->id = $post['id'];
                $excluido = $disciplina->excluir();
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