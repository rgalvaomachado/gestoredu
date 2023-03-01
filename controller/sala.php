<?php
    include_once('../model/sala.php');

    class SalaController{
        function getSalas(){
            $salas = new Sala();
            return $salas->getSalas();
        }

        function getSala($id){
            $sala = new Sala();
            return $sala->getSala($id);
        }

        function criarSala($post){
            $sala = new Sala();
            $sala->nome = $post['nome'];
            $sala->criar();
            header('Location: ../sala_cadastro.php?sucess=true');
        }

        function buscarSala($post){
            $id = $post['sala'];
            header('Location: ../sala_editar.php?sala='.$id);
        }

        function salvarSala($post){
            $sala = new Sala();
            $sala->nome = $post['nome'];
            $sala->salvar($post['id']);
            header('Location: ../sala_editar.php?sucess=true');
        }

        function excluirSala($post){
            $sala = new Sala();
            $sala->id = $post['id'];
            $sala->excluir();
            header('Location: ../sala_editar.php?delete=true');
        }
    }
?>