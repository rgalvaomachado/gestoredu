<?php
    include_once('Database.php');

    class Representante extends Database{
        public $nome;
        public $usuario;
        public $senha;
        public $assinatura;

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
            $getRepresentantes =  $this->bd->prepare('SELECT id, nome, usuario, senha, assinatura FROM representante ORDER BY nome ASC');
            $getRepresentantes->execute();
            return $getRepresentantes->fetchAll(PDO::FETCH_ASSOC);
        }

        function getRepresentante($id){
            $getRepresentante =  $this->bd->prepare('SELECT id, nome, usuario, senha, assinatura FROM representante WHERE id = :id ORDER BY nome ASC');
            $getRepresentante->execute([
                ':id' => $id,
            ]);
            return $getRepresentante->fetch(PDO::FETCH_ASSOC);
        }

        function salvarRepresentante($id){ 
            $salvarRepresentante = $this->bd->prepare('UPDATE representante SET nome = :nome, usuario = :usuario, senha = :senha WHERE id = :id');
            $salvarRepresentante->execute([
              ':id'   => $id,
              ':nome' => $this->nome,
              ':usuario' => $this->usuario,
              ':senha' => md5($this->senha)
            ]);
            return $salvarRepresentante->rowCount();
        }

        function excluir(){
            $excluir = $this->bd->prepare('DELETE FROM representante where id = :id');
            $excluir->execute([
                ':id' => $this->id,
            ]);
            return $excluir->rowCount();
        }

        function salvarAssinatura($id){ 
            $salvarAssinatura = $this->bd->prepare('UPDATE representante SET assinatura = :assinatura WHERE id = :id');
            $salvarAssinatura->execute([
            ':id'   => $id,
            ':assinatura' => $this->assinatura,
            ]);
            return $salvarAssinatura->rowCount();
        }
    }
?>