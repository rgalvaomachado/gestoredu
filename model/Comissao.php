<?php
    include_once('database.php');

    class Comissao extends BD{
        public $nome;
        public $usuario;
        public $senha;

        function criarComissao(){
            $stmt = $this->bd->prepare('INSERT INTO comissao (nome, usuario, senha) VALUES(:nome, :usuario, :senha)');
            $stmt->execute([
                ':nome' => $this->nome,
                ':usuario' => $this->usuario,
                ':senha' => md5($this->senha)
            ]);
        }

        function getComissoes(){
            $getComissoes =  $this->bd->prepare('SELECT id,nome,usuario,senha FROM comissao ORDER BY nome ASC');
            $getComissoes->execute();
            return $getComissoes->fetchAll(PDO::FETCH_ASSOC);
        }

        function getComissao($id){
            $getComissao =  $this->bd->prepare('SELECT nome,usuario,senha FROM comissao WHERE id = :id ORDER BY nome ASC');
            $getComissao->execute([
                ':id' => $id,
            ]);
            return $getComissao->fetch(PDO::FETCH_ASSOC);
        }

        function salvarComissao($id){
            $stmt = $this->bd->prepare('UPDATE comissao SET nome = :nome, usuario = :usuario, senha = :senha WHERE id = :id');
            $stmt->execute([
              ':id'   => $id,
              ':nome' => $this->nome,
              ':usuario' => $this->usuario,
              ':senha' => md5($this->senha)
            ]);
        }

        function excluir(){
            $stmt = $this->bd->prepare('DELETE FROM comissao where id = :id');
            $stmt->execute([
              ':id' => $this->id,
            ]);
        }
    }
?>