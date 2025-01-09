<?php
    class AtribuicaoController{
        function buscarAtribuicoesUsuario($post){
            $Atribuicao = new Atribuicao();
            $Atribuicao->cod_usuario = $post['cod_usuario'];
            $atribuicoes = $Atribuicao->buscar();

            return json_encode([
                "access" => true,
                "atribuicoes" => $atribuicoes,
            ]);
           
        }

        function buscarAtribuicoesDisciplina($post){
            $Atribuicao = new Atribuicao();
            $Atribuicao->cod_disciplina = $post['cod_disciplina'];
            $atribuicoes = $Atribuicao->buscar();

            return json_encode([
                "access" => true,
                "atribuicoes" => $atribuicoes,
            ]);
        }

        function buscarAtribuicoesSala($post){
            $Atribuicao = new Atribuicao();
            $Atribuicao->cod_sala = $post['cod_sala'];
            $atribuicoes = $Atribuicao->buscar();

            return json_encode([
                "access" => true,
                "atribuicoes" => $atribuicoes,
            ]);
        }
    }
?>