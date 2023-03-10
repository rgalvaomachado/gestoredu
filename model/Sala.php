<?php
    include_once('Database.php');

    class Sala extends BD{
        public $nome;
        public $disciplina;

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO sala (nome) VALUES(:nome)');
            $criar->execute([
                ':nome' => $this->nome
            ]);
            return $this->bd->lastInsertId();
        }

        function getSalas(){
            $getSalas =  $this->bd->prepare('SELECT id, nome FROM sala ORDER BY nome ASC');
            $getSalas->execute();
            return $getSalas->fetchAll(PDO::FETCH_ASSOC);
        }

        function getSala($id){
            $getSala =  $this->bd->prepare('SELECT id, nome FROM sala WHERE id = :id ');
            $getSala->execute([
                ':id' => $id,
            ]);
            return $getSala->fetch(PDO::FETCH_ASSOC);
        }

        function salvar($id){
            $salvar = $this->bd->prepare('UPDATE sala SET nome = :nome WHERE id = :id');
            $salvar->execute([
              ':id'   => $id,
              ':nome' => $this->nome,
            ]);
            return $salvar->rowCount();
        }

        function excluir(){
            $excluir = $this->bd->prepare('DELETE FROM sala where id = :id');
            $excluir->execute([
              ':id' => $this->id,
            ]);
            return $excluir->rowCount();
        }
    }
?>