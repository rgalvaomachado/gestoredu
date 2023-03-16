<?php
    include_once('Database.php');

    class Disciplina extends Database{
        public $nome;
        public $disciplina;

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO disciplina (nome) VALUES(:nome)');
            $criar->execute([
                ':nome' => $this->nome
            ]);
            return $this->bd->lastInsertId();
        }

        function getDisciplinas(){
            $getDisciplina =  $this->bd->prepare('SELECT id, nome FROM disciplina ORDER BY nome ASC');
            $getDisciplina->execute();
            return $getDisciplina->fetchAll(PDO::FETCH_ASSOC);
        }

        function getDisciplina($id){
            $getDisciplina =  $this->bd->prepare('SELECT id, nome FROM disciplina WHERE id = :id ORDER BY nome ASC');
            $getDisciplina->execute([
                ':id' => $id,
            ]);
            return $getDisciplina->fetch(PDO::FETCH_ASSOC);
        }

        function salvar($id){
            $salvar = $this->bd->prepare('UPDATE disciplina SET nome = :nome WHERE id = :id');
            $salvar->execute([
              ':id'   => $id,
              ':nome' => $this->nome,
            ]);
            return $salvar->rowCount();
        }

        function excluir(){
            $excluir = $this->bd->prepare('DELETE FROM disciplina where id = :id');
            $excluir->execute([
              ':id' => $this->id,
            ]);
            return $excluir->rowCount();
        }
    }
?>