<?php
    include_once('Database.php');

    class Comissao extends Database{
        public $nome;
        public $usuario;
        public $senha;

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO comissao (nome, usuario, senha) VALUES(:nome, :usuario, :senha)');
            $criar->execute([
                ':nome' => $this->nome,
                ':usuario' => $this->usuario,
                ':senha' => md5($this->senha)
            ]);
            return $this->bd->lastInsertId();
        }

        function getComissoes(){
            $getComissoes =  $this->bd->prepare('SELECT id, nome, usuario, senha FROM comissao ORDER BY nome ASC');
            $getComissoes->execute();
            return $getComissoes->fetchAll(PDO::FETCH_ASSOC);
        }

        function getComissao($id){
            $getComissao =  $this->bd->prepare('SELECT id, nome, usuario, senha FROM comissao WHERE id = :id ORDER BY nome ASC');
            $getComissao->execute([
                ':id' => $id,
            ]);
            return $getComissao->fetch(PDO::FETCH_ASSOC);
        }

        function salvar($id){
            $salvar = $this->bd->prepare('UPDATE comissao SET nome = :nome, usuario = :usuario, senha = :senha WHERE id = :id');
            $salvar->execute([
              ':id'   => $id,
              ':nome' => $this->nome,
              ':usuario' => $this->usuario,
              ':senha' => md5($this->senha)
            ]);
            return $salvar->rowCount();
        }

        function excluir(){
            $excluir = $this->bd->prepare('DELETE FROM comissao where id = :id');
            $excluir->execute([
              ':id' => $this->id,
            ]);
            return $excluir->rowCount();
        }
    }
?>