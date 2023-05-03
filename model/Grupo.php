<?php
    include_once(dirname(__FILE__).'/Database.php');

    class Grupo extends Database{
        public $id;
        public $nome;

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO grupo (nome) VALUES(:nome)');
            $criar->execute([
                ':nome' => $this->nome,
            ]);
            return $this->bd->lastInsertId();
        }

        function buscarTodos(){
            $getTodos =  $this->bd->prepare('SELECT id, nome FROM grupo ORDER BY nome ASC');
            $getTodos->execute();
            return $getTodos->fetchAll(PDO::FETCH_ASSOC);
        }

        function buscar(){
            $get =  $this->bd->prepare('SELECT id, nome FROM grupo WHERE id = :id ORDER BY nome ASC');
            $get->execute([
                ':id' => $this->id,
            ]);
            return $get->fetch(PDO::FETCH_ASSOC);
        }

        function editar(){
            $editar = $this->bd->prepare('UPDATE grupo SET nome = :nome WHERE id = :id');
            $editar->execute([
              ':id'   => $this->id,
              ':nome' => $this->nome,
            ]);
            return $editar->rowCount();
        }

        function deletar(){
            $deletar = $this->bd->prepare('DELETE FROM grupo where id = :id');
            $deletar->execute([
              ':id' => $this->id,
            ]);
            return $deletar->rowCount();
        }
    }
?>