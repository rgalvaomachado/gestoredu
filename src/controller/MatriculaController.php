<?php
    class MatriculaController{
        function buscarTodos($post){
            $Matricula = new Matricula();
            $Matricula->cod_usuario = $post['cod_usuario'] ?? null;
            $Matricula->cod_sala = $post['cod_sala'] ?? null;
            $Matricula->cod_disciplina = $post['cod_disciplina'] ?? null;
            $matriculas = $Matricula->buscar();

            return json_encode([
                "access" => true,
                "matriculas" => $matriculas,
            ]);
        }

        function buscarTodosUsuario($post){
            $Matricula = new Matricula();
            $Matricula->cod_usuario = $post['cod_usuario'];
            $matriculas = $Matricula->buscar();

            return json_encode([
                "access" => true,
                "matriculas" => $matriculas,
            ]);
           
        }

        function buscarTodosDisciplina($post){
            $Matricula = new Matricula();
            $Matricula->cod_disciplina = $post['cod_disciplina'];
            $matriculas = $Matricula->buscar();

            return json_encode([
                "access" => true,
                "matriculas" => $matriculas,
            ]);
        }

        function buscarTodosSala($post){
            $Matricula = new Matricula();
            $Matricula->cod_sala = $post['cod_sala'];
            $matriculas = $Matricula->buscar();

            return json_encode([
                "access" => true,
                "matriculas" => $matriculas,
            ]);
        }
    }
?>