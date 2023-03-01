<?php
    include_once('database.php');

    class Sala extends BD{
        public $nome;
        public $disciplina;

        function criar(){
            $stmt = $this->bd->prepare('INSERT INTO sala (nome) VALUES(:nome)');
            $stmt->execute([
                ':nome' => $this->nome
            ]);
        }

        function getSalas(){
            $getSalas =  $this->bd->prepare('SELECT id, nome FROM sala ORDER BY nome ASC');
            $getSalas->execute();
            return $getSalas->fetchAll(PDO::FETCH_ASSOC);
        }

        function getSala($id){
            $getSala =  $this->bd->prepare('SELECT nome FROM sala WHERE id = :id ');
            $getSala->execute([
                ':id' => $id,
            ]);
            return $getSala->fetch(PDO::FETCH_ASSOC);
        }

        function salvar($id){
            $stmt = $this->bd->prepare('UPDATE sala SET nome = :nome WHERE id = :id');
            $stmt->execute([
              ':id'   => $id,
              ':nome' => $this->nome,
            ]);
        }

        function excluir(){
            $stmt = $this->bd->prepare('DELETE FROM sala where id = :id');
            $stmt->execute([
              ':id' => $this->id,
            ]);
        }
    }
?>