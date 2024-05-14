<?php
    include_once('Database.php');

    class Usuario extends Database{
        public $id;

        public $nome;
        public $data_nascimento;
        public $rg;
        public $cpf;
        public $endereco;
        public $telefone;
        public $data_inscricao;
        public $data_desligamento;
        public $orgao_regulamentador;

        public $email;
        public $senha;

        public $grupos;
        public $salas;
        public $disciplinas;

        function buscarTodos(){
            $sql = "SELECT * FROM usuario ORDER BY nome ASC";

            if (isset($this->grupos) && !isset($this->salas) && !isset($this->disciplinas)){
                $sql = "SELECT * FROM usuario WHERE grupos like '%#".$this->grupos."#%' ORDER BY nome ASC";
            }

            if (!isset($this->grupos) && !isset($this->salas) && isset($this->disciplinas)){
                $sql = "SELECT * FROM usuario WHERE disciplinas like '%#".$this->disciplinas."#%' ORDER BY nome ASC";
            }

            if (!isset($this->grupos) && isset($this->salas) && !isset($this->disciplinas)){
                $sql = "SELECT * FROM usuario WHERE salas like '%#".$this->salas."#%' ORDER BY nome ASC";
            }

            if (isset($this->grupos) && isset($this->salas) && isset($this->disciplinas)) {
                $sql = "SELECT * FROM usuario WHERE grupos like '%#".$this->grupos."#%' AND salas like '%#".$this->salas."#%' AND disciplinas like '%#".$this->disciplinas."#%' ORDER BY nome ASC";
            }

            $buscarTodos = $this->bd->prepare($sql);
            $buscarTodos->execute();
            return $buscarTodos->fetchAll(PDO::FETCH_ASSOC);
        }

        function buscar(){
            $buscar =  $this->bd->prepare('SELECT * FROM usuario WHERE id = :id ORDER BY nome ASC');
            $buscar->execute([
                ':id' => $this->id,
            ]);
            return $buscar->fetch(PDO::FETCH_ASSOC);
        }

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO usuario (
                nome,
                data_nascimento,
                rg,
                cpf,
                endereco,
                telefone,
                email,
                senha,
                data_inscricao,
                grupos,
                disciplinas,
                salas
            ) VALUES(
                :nome,
                :data_nascimento,
                :rg,
                :cpf, 
                :endereco,
                :telefone,
                :email,
                :senha,
                :data_inscricao,
                :grupos,
                :disciplinas,
                :salas
            )');
            $criar->execute([
                ':nome' => $this->nome,
                ':data_nascimento' => $this->data_nascimento,
                ':rg' => $this->rg,
                ':cpf' => $this->cpf,
                ':endereco' => $this->endereco,
                ':telefone' => $this->telefone,
                ':email' => $this->email,
                ':senha' => $this->senha,
                ':data_inscricao' => $this->data_inscricao,
                ':grupos' => $this->grupos,
                ':disciplinas' => $this->disciplinas,
                ':salas' => $this->salas,
            ]);
            return $this->bd->lastInsertId();
        }

        function editar(){
            $editar = $this->bd->prepare('UPDATE usuario SET 
                nome = :nome,
                data_nascimento = :data_nascimento, 
                rg = :rg,
                cpf = :cpf,
                endereco = :endereco,
                telefone = :telefone,
                email = :email,
                senha = :senha,
                grupos = :grupos,
                disciplinas = :disciplinas,
                salas = :salas
                WHERE id = :id'
            );
            $editar->execute([
              ':id'   => $this->id,
              ':nome' => $this->nome,
              ':data_nascimento' => $this->data_nascimento,
              ':rg' => $this->rg,
              ':cpf' => $this->cpf,
              ':endereco' => $this->endereco,
              ':telefone' => $this->telefone,
              ':email' => $this->email,
              ':senha' => $this->senha,
              ':grupos' => $this->grupos,
              ':disciplinas' => $this->disciplinas,
              ':salas' => $this->salas,
            ]);
            return $this->id;
        }

        function deletar(){
            $deletar = $this->bd->prepare('DELETE FROM usuario where id = :id');
            $deletar->execute([
              ':id' => $this->id,
            ]);
            return $this->id;
        }
    }
?>