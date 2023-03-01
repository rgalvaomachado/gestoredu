<?php
    include_once('database.php');

    class Representante extends BD{
        public $nome;
        public $usuario;
        public $senha;

        function criarRepresentante(){
            $criarRepresentante = $this->bd->prepare('INSERT INTO representante (nome, usuario, senha) VALUES(:nome, :usuario, :senha)');
            $criarRepresentante->execute([
                ':nome' => $this->nome,
                ':usuario' => $this->usuario,
                ':senha' => md5($this->senha)
            ]);
            return $this->bd->lastInsertId();
        }

        function getRepresentantes(){
            $getRepresentantes =  $this->bd->prepare('SELECT id,nome,usuario,senha FROM representante ORDER BY nome ASC');
            $getRepresentantes->execute();
            return $getRepresentantes->fetchAll(PDO::FETCH_ASSOC);
        }

        function getRepresentante($id){
            $getRepresentante =  $this->bd->prepare('SELECT nome,usuario,senha FROM representante WHERE id = :id ORDER BY nome ASC');
            $getRepresentante->execute([
                ':id' => $id,
            ]);
            return $getRepresentante->fetch(PDO::FETCH_ASSOC);
        }

        function salvarRepresentante($id){ 
            $stmt = $this->bd->prepare('UPDATE representante SET nome = :nome, usuario = :usuario, senha = :senha WHERE id = :id');
            $stmt->execute([
              ':id'   => $id,
              ':nome' => $this->nome,
              ':usuario' => $this->usuario,
              ':senha' => md5($this->senha)
            ]);
        }

        function excluir(){
            $stmt = $this->bd->prepare('DELETE FROM representante where id = :id');
            $stmt->execute([
              ':id' => $this->id,
            ]);
        }
    }
?>