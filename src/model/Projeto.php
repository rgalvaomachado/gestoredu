<?php
    include_once('Database.php');

    class Projeto extends Database{
        public $id;
        public $cod_usuario;
        public $nome;

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO projeto (nome, cod_usuario) VALUES(:nome, :cod_usuario)');
            $criar->execute([
                ':nome' => $this->nome,
                ':cod_usuario' => $this->cod_usuario,
            ]);
            return $this->bd->lastInsertId();
        }

        function buscarTodos(){
            $getTodos =  $this->bd->prepare('SELECT id, nome FROM projeto ORDER BY nome ASC');
            $getTodos->execute();
            return $getTodos->fetchAll(PDO::FETCH_ASSOC);
        }

        function buscar(){
            $get =  $this->bd->prepare('SELECT id, nome FROM projeto WHERE id = :id ORDER BY nome ASC');
            $get->execute([
                ':id' => $this->id,
            ]);
            return $get->fetch(PDO::FETCH_ASSOC);
        }

        function buscarProjetoUsuario(){
            $get =  $this->bd->prepare('SELECT id, nome FROM projeto WHERE cod_usuario = :cod_usuario ORDER BY nome ASC');
            $get->execute([
                ':cod_usuario' => $this->cod_usuario,
            ]);
            return $get->fetch(PDO::FETCH_ASSOC);
        }

        function editar(){
            $editar = $this->bd->prepare('UPDATE projeto SET nome = :nome WHERE id = :id');
            $editar->execute([
              ':id'   => $this->id,
              ':nome' => $this->nome,
            ]);
            return $editar->rowCount();
        }

        function deletar(){
            $deletar = $this->bd->prepare('DELETE FROM projeto where id = :id');
            $deletar->execute([
              ':id' => $this->id,
            ]);
            return $deletar->rowCount();
        }
    }
?>