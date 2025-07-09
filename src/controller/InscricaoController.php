<?php
    class InscricaoController {
        function buscarTodos($post){
            $Inscricao = new Inscricao();
            $Inscricao->cod_usuario = $post['cod_usuario'] ?? null;
            $Inscricao->cod_sala = $post['sala'] ?? null;
            $Inscricao->cod_disciplina = $post['disciplina'] ?? null;
            $inscricoes = $Inscricao->buscar();

            return json_encode([
                "access" => true,
                "inscricoes" => $inscricoes,
            ]);
        }

        function buscarTodosUsuario($post){
            $Inscricao = new Inscricao();
            $Inscricao->cod_usuario = $post['cod_usuario'];
            $inscricoes = $Inscricao->buscar();

            return json_encode([
                "access" => true,
                "inscricoes" => $inscricoes,
            ]);
           
        }

        function buscarTodosDisciplina($post){
            $Inscricao = new Inscricao();
            $Inscricao->cod_disciplina = $post['cod_disciplina'];
            $inscricoes = $Inscricao->buscar();

            return json_encode([
                "access" => true,
                "inscricoes" => $inscricoes,
            ]);
        }

        function buscarTodosSala($post){
            $Inscricao = new Inscricao();
            $Inscricao->cod_sala = $post['cod_sala'];
            $inscricoes = $Inscricao->buscar();

            return json_encode([
                "access" => true,
                "inscricoes" => $inscricoes,
            ]);
        }
    }
?>