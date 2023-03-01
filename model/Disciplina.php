<?php
    include_once('database.php');

    class Disciplina extends BD{
        public $nome;
        public $disciplina;

        function criar(){
            $stmt = $this->bd->prepare('INSERT INTO disciplina (nome) VALUES(:nome)');
            $stmt->execute([
                ':nome' => $this->nome
            ]);
        }

        function getDisciplinas(){
            $getDisciplina =  $this->bd->prepare('SELECT id,nome FROM disciplina ORDER BY nome ASC');
            $getDisciplina->execute();
            return $getDisciplina->fetchAll(PDO::FETCH_ASSOC);
        }

        function getDisciplina($id){
            $getDisciplina =  $this->bd->prepare('SELECT nome FROM disciplina WHERE id = :id ORDER BY nome ASC');
            $getDisciplina->execute([
                ':id' => $id,
            ]);
            return $getDisciplina->fetch(PDO::FETCH_ASSOC);
        }

        function salvar($id){
            $stmt = $this->bd->prepare('UPDATE disciplina SET nome = :nome WHERE id = :id');
            $stmt->execute([
              ':id'   => $id,
              ':nome' => $this->nome,
            ]);
        }

        function excluir(){
            $stmt = $this->bd->prepare('DELETE FROM disciplina where id = :id');
            $stmt->execute([
              ':id' => $this->id,
            ]);
        }
    }
?>