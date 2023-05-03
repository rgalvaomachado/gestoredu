<?php
    include_once(dirname(__FILE__).'/Database.php');

    class Usuario extends Database{
        public $id;
        public $nome;
        public $email;
        public $senha;
        public $grupos;
        public $salas;
        public $disciplinas;

        function buscarTodos(){
            $sql = "SELECT id, nome, email, senha FROM usuario ORDER BY nome ASC";

            if (isset($this->grupos) && !isset($this->salas) && !isset($this->disciplinas)){
                $sql = "SELECT id,nome FROM usuario WHERE grupos like '%#".$this->grupos."#%' ORDER BY nome ASC";
            }

            if (!isset($this->grupos) && !isset($this->salas) && isset($this->disciplinas)){
                $sql = "SELECT id,nome FROM usuario WHERE disciplinas like '%#".$this->disciplinas."#%' ORDER BY nome ASC";
            }

            if (!isset($this->grupos) && isset($this->salas) && !isset($this->disciplinas)){
                $sql = "SELECT id,nome FROM usuario WHERE salas like '%#".$this->salas."#%' ORDER BY nome ASC";
            }

            if (isset($this->grupos) && isset($this->salas) && isset($this->disciplinas)) {
                $sql = "SELECT id,nome FROM usuario WHERE grupos like '%#".$this->grupos."#%' AND salas like '%#".$this->salas."#%' AND disciplinas like '%#".$this->disciplinas."#%' ORDER BY nome ASC";
            }

            $buscarTodos = $this->bd->prepare($sql);
            $buscarTodos->execute();
            return $buscarTodos->fetchAll(PDO::FETCH_ASSOC);
        }

        function buscar(){
            $buscar =  $this->bd->prepare('SELECT id, nome, email, senha, grupos, disciplinas, salas FROM usuario WHERE id = :id ORDER BY nome ASC');
            $buscar->execute([
                ':id' => $this->id,
            ]);
            return $buscar->fetch(PDO::FETCH_ASSOC);
        }

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO usuario (nome, email, senha, grupos, disciplinas, salas) VALUES(:nome, :email, :senha, :grupos, :disciplinas, :salas)');
            $criar->execute([
                ':nome' => $this->nome,
                ':email' => $this->email,
                ':senha' => md5($this->senha),
                ':grupos' => $this->grupos,
                ':disciplinas' => $this->disciplinas,
                ':salas' => $this->salas,
            ]);
            return $this->bd->lastInsertId();
        }

        function editar(){
            $editar = $this->bd->prepare('UPDATE usuario SET nome = :nome, email = :email, senha = :senha, grupos = :grupos, disciplinas = :disciplinas, salas = :salas WHERE id = :id');
            $editar->execute([
              ':id'   => $this->id,
              ':nome' => $this->nome,
              ':email' => $this->email,
              ':senha' => md5($this->senha),
              ':grupos' => $this->grupos,
              ':disciplinas' => $this->disciplinas,
              ':salas' => $this->salas,
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