<?php
    include_once('Database.php');

    class Monitore extends BD{
        public $nome;
        public $usuario;
        public $senha;

        function criarMonitore(){
            $criar = $this->bd->prepare('INSERT INTO monitore (nome, usuario, senha) VALUES(:nome, :usuario, :senha)');
            $criar->execute([
                ':nome' => $this->nome,
                ':usuario' => $this->usuario,
                ':senha' => md5($this->senha)
            ]);
            return $this->bd->lastInsertId();
        }

        function getMonitores(){
            $getMonitores =  $this->bd->prepare('SELECT id, nome, usuario, senha FROM monitore ORDER BY nome ASC');
            $getMonitores->execute();
            return $getMonitores->fetchAll(PDO::FETCH_ASSOC);
        }

        function getMonitore($id){
            $getMonitore =  $this->bd->prepare('SELECT id, nome, usuario, senha FROM monitore WHERE id = :id ORDER BY nome ASC');
            $getMonitore->execute([
                ':id' => $id,
            ]);
            return $getMonitore->fetch(PDO::FETCH_ASSOC);
        }

        function salvarMonitore($id){
            $salvar = $this->bd->prepare('UPDATE monitore SET nome = :nome, usuario = :usuario, senha = :senha WHERE id = :id');
            $salvar->execute([
              ':id'   => $id,
              ':nome' => $this->nome,
              ':usuario' => $this->usuario,
              ':senha' => md5($this->senha)
            ]);
            return $salvar->rowCount();
        }

        function excluir(){
            $excluir = $this->bd->prepare('DELETE FROM monitore where id = :id');
            $excluir->execute([
              ':id' => $this->id,
            ]);
            return $excluir->rowCount();
        }
    }
?>