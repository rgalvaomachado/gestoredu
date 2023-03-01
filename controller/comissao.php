<?php
    include_once('../model/comissao.php');

    class ComissaoController{
        function getComissoes(){
            $comissoes = new Comissao();
            return $comissoes->getComissoes();
        }

        function getComissao($id){
            $comissao = new Comissao();
            return $comissao->getComissao($id);
        }

        function criarComissao($post){
            $comissao = new Comissao();
            $comissao->nome = $post['nome'];
            $comissao->usuario = $post['usuario'];
            $comissao->senha = $post['senha'];
            $comissao->criarComissao();
            header('Location: ../comissao_cadastro.php?sucess=true');
        }

        function buscarComissao($post){
            $id = $post['comissao'];
            header('Location: ../comissao_editar.php?comissao='.$id);
        }

        function salvarComissao($post){
            $comissao = new Comissao();
            $comissao->nome = $post['nome'];
            $comissao->usuario = $post['usuario'];
            $comissao->senha = $post['senha'];
            $comissao->salvarComissao($post['id']);
            header('Location: ../comissao_editar.php?sucess=true');
        }

        function excluirComissao($post){
            $comissao = new Comissao();
            $comissao->id = $post['id'];
            $comissao->excluir();
            header('Location: ../comissao_editar.php?delete=true');
        }
    }
?>