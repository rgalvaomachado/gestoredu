<?php
    include_once(dirname(__FILE__).'/Database.php');

    class Usuario extends Database{
        public $id;
        public $nome;
        public $email;
        public $senha;
        public $grupos;

        function buscarTodos(){
            $buscarTodos =  $this->bd->prepare('SELECT id, nome FROM usuario ORDER BY nome ASC');
            $buscarTodos->execute();
            return $buscarTodos->fetchAll(PDO::FETCH_ASSOC);
        }

        function buscarUsuariosGrupo(){
            $buscarUsuariosGrupo =  $this->bd->prepare("SELECT id,nome FROM usuario WHERE grupos like '%#".$this->grupos."#%'");
            $buscarUsuariosGrupo->execute();
            return $buscarUsuariosGrupo->fetchAll(PDO::FETCH_ASSOC);
        }

        function buscar(){
            $buscar =  $this->bd->prepare('SELECT id, nome, grupos, email, senha FROM usuario WHERE id = :id ORDER BY nome ASC');
            $buscar->execute([
                ':id' => $this->id,
            ]);
            return $buscar->fetch(PDO::FETCH_ASSOC);
        }

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO usuario (nome, grupos, email, senha) VALUES(:nome, :grupos, :email, :senha)');
            $criar->execute([
                ':nome' => $this->nome,
                ':grupos' => $this->grupos,
                ':email' => $this->email,
                ':senha' => md5($this->senha)
            ]);
            return $this->bd->lastInsertId();
        }

        function editar(){
            $editar = $this->bd->prepare('UPDATE usuario SET nome = :nome, grupos = :grupos, email = :email, senha = :senha WHERE id = :id');
            $editar->execute([
              ':id'   => $this->id,
              ':nome' => $this->nome,
              ':grupos' => $this->grupos,
              ':email' => $this->email,
              ':senha' => md5($this->senha)
            ]);
            return $editar->rowCount();
        }

        function deletar(){
            $deletar = $this->bd->prepare('DELETE FROM usuario where id = :id');
            $deletar->execute([
              ':id' => $this->id,
            ]);
            return $deletar->rowCount();
        }
    }
?>