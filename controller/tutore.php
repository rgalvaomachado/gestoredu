<?php
    include_once('../model/tutore.php');

    class TutoreController{
        function getTutores(){
            $tutores = new Tutore();
            return $tutores->getTutores();
        }

        function getTutore($id){
            $tutore = new Tutore();
            return $tutore->getTutore($id);
        }

        function criarTutore($post){
            $tutore = new Tutore();
            $tutore->nome = $post['nome'];
            $tutore->disciplina = $post['disciplina'];
            $tutore->criarTutore();
            header('Location: ../tutore_cadastro.php?sucess=true');
        }

        function buscarTutore($post){
            $id = $post['tutore'];
            header('Location: ../tutore_editar.php?tutore='.$id);
        }

        function salvarTutore($post){
            $tutore = new Tutore();
            $tutore->nome = $post['nome'];
            $tutore->disciplina = $post['disciplina'];
            $tutore->salvar($post['id']);
            header('Location: ../tutore_editar.php?sucess=true');
        }

        function excluirTutore($post){
            $tutore = new Tutore();
            $tutore->id = $post['id'];
            $tutore->excluir();
            header('Location: ../tutore_editar.php?delete=true');
        }
    }
?>