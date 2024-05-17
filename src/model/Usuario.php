<?php
    include_once('Database.php');
    include_once('src/model/Grupo.php');
    include_once('src/model/Disciplina.php');
    include_once('src/model/Sala.php');

    class Usuario extends Database{
        public $id;

        public $nome;
        public $data_nascimento;
        public $rg;
        public $cpf;
        public $rua;
        public $numero;
        public $bairro;
        public $cidade;
        public $estado;
        public $telefone;
        public $data_inscricao;

        public $email;
        public $senha;
        
        public $grupos;
        public $salas;
        public $disciplinas;

        function buscarTodos(){
            $sql = "SELECT * FROM usuario ORDER BY nome ASC";

            if (isset($this->grupos) && !isset($this->salas) && !isset($this->disciplinas)){
                $sql = "
                    SELECT usuario.*
                    FROM usuario
                    JOIN usuario_grupo ON usuario.id = usuario_grupo.cod_usuario
                    WHERE usuario_grupo.cod_grupo IN (".$this->grupos.")
                    ORDER BY usuario.nome ASC;
                ";
            }

            if (!isset($this->grupos) && isset($this->disciplinas) && !isset($this->salas)){
                $sql = "
                    SELECT usuario.*
                    FROM usuario
                    JOIN usuario_disciplina ON usuario.id = usuario_disciplina.cod_usuario
                    WHERE usuario_disciplina.cod_disciplina IN (".$this->disciplinas.")
                    ORDER BY usuario.nome ASC;
                ";
            }

            if (!isset($this->grupos) && !isset($this->disciplinas) && isset($this->salas)){
                $sql = "
                    SELECT usuario.*
                    FROM usuario
                    JOIN usuario_sala ON usuario.id = usuario_sala.cod_usuario
                    WHERE usuario_sala.cod_sala IN (".$this->salas.")
                    ORDER BY usuario.nome ASC;
                ";
            }

            if (isset($this->grupos) && isset($this->salas) && isset($this->disciplinas)) {
                $sql = "
                    SELECT usuario.*
                    FROM usuario
                    JOIN usuario_grupo ON usuario.id = usuario_grupo.cod_usuario
                    JOIN usuario_disciplina ON usuario.id = usuario_disciplina.cod_usuario
                    JOIN usuario_sala ON usuario.id = usuario_sala.cod_usuario
                    WHERE 
                        usuario_grupo.cod_grupo IN (".$this->grupos.") &&
                        usuario_disciplina.cod_disciplina IN (".$this->disciplinas.") &&
                        usuario_sala.cod_sala IN (".$this->salas.")
                    ORDER BY usuario.nome ASC;
                ";
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
                rua,
                numero,
                bairro,
                cidade,
                estado,
                telefone,
                email,
                senha,
                data_inscricao
            ) VALUES(
                :nome,
                :data_nascimento,
                :rg,
                :cpf, 
                :rua,
                :numero,
                :bairro,
                :cidade,
                :estado,
                :telefone,
                :email,
                :senha,
                :data_inscricao
            )');
            $criar->execute([
                ':nome' => $this->nome,
                ':data_nascimento' => $this->data_nascimento,
                ':rg' => $this->rg,
                ':cpf' => $this->cpf,
                ':rua' => $this->rua,
                ':numero' => $this->numero,
                ':bairro' => $this->bairro,
                ':cidade' => $this->cidade,
                ':estado' => $this->estado,
                ':telefone' => $this->telefone,
                ':email' => $this->email,
                ':senha' => $this->senha,
                ':data_inscricao' => $this->data_inscricao,
            ]);
            return $this->bd->lastInsertId();
        }

        function editar(){
            $editar = $this->bd->prepare('UPDATE usuario SET 
                nome = :nome,
                data_nascimento = :data_nascimento, 
                rg = :rg,
                cpf = :cpf,
                rua = :rua,
                numero = :numero,
                bairro = :bairro,
                cidade = :cidade,
                estado = :estado,
                telefone = :telefone,
                email = :email,
                senha = :senha
                WHERE id = :id'
            );
            $editar->execute([
              ':id'   => $this->id,
              ':nome' => $this->nome,
              ':data_nascimento' => $this->data_nascimento,
              ':rg' => $this->rg,
              ':cpf' => $this->cpf,
              ':rua' => $this->rua,
              ':numero' => $this->numero,
              ':bairro' => $this->bairro,
              ':cidade' => $this->cidade,
              ':estado' => $this->estado,
              ':telefone' => $this->telefone,
              ':email' => $this->email,
              ':senha' => $this->senha,
            ]);
            return $this->id;
        }

        function deletar(){
            $deletar = $this->bd->prepare('DELETE FROM usuario where id = :id');
            $deletar->execute([
              ':id' => $this->id,
            ]);

            $Disciplina = new Disciplina();
            $Disciplina->cod_usuario = $this->id;
            $Disciplina->usuario_disciplina_deletar();

            $Sala = new Sala();
            $Sala->cod_usuario = $this->id;
            $Sala->usuario_sala_deletar();

            // $Disciplina = new Disciplina();
            // $Disciplina->cod_usuario = $id;
            // $Disciplina->usuario_disciplina_deletar();
            return $this->id;
        }
    }
?>