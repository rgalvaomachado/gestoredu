<?php
    include_once('src/model/Disciplina.php');
    include_once('src/model/Usuario.php');

    class DisciplinaController{
        function buscarTodos(){
            $Disciplina = new Disciplina();
            $Disciplinas = $Disciplina->buscarTodos();
            return json_encode([
                "access" => true,
                "disciplinas" => $Disciplinas
            ]);
        }

        function buscar($post){
            $Disciplina = new Disciplina();
            $Disciplina->id = $post['id'];
            $buscarDisciplina = $Disciplina->buscar();

            $usuario = new Usuario();
            $usuario->disciplinas = $post['id'];
            $usuarios = $usuario->buscarTodos();
            $buscarDisciplina['usuarios'] = $usuarios;

            if(!empty($buscarDisciplina)){
                return json_encode([
                    "access" => true,
                    "disciplina" => $buscarDisciplina,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Disciplina não encontrado"
                ]);
            }
        }

        function criar($post){
            $Disciplina = new Disciplina();
            $Disciplina->nome = $post['nome'];

            $id = $Disciplina->criar();
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
            $Disciplina = new Disciplina();
            $Disciplina->id = $post['id'];
            $Disciplina->nome = $post['nome'];
            $id = $Disciplina->editar();
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
            $Disciplina = new Disciplina();
            $Disciplina->id = $post['id'];
            $deletado = $Disciplina->deletar();
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