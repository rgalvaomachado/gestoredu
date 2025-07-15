<?php
    class Usuario extends Model{
        protected $table = 'usuario';

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

        function buscarPorGrupos($grupos = []){
            $sql = "
                SELECT usuario.*
                FROM usuario
                LEFT JOIN usuario_grupo ON usuario.id = usuario_grupo.cod_usuario
                WHERE usuario_grupo.cod_grupo in (". implode(',', $grupos) .");
            ";

            $buscar = $this->connection->prepare($sql);
            $buscar->execute();
            return $buscar->fetchAll(PDO::FETCH_ASSOC);
        }

        function buscarPorNome($nome, $grupo){
            $sql = "
                SELECT {$this->table}.id, {$this->table}.nome
                FROM {$this->table} 
                INNER JOIN usuario_grupo on usuario_grupo.cod_usuario = {$this->table}.id
                WHERE lower({$this->table}.nome) like :nome AND usuario_grupo.cod_grupo = :grupo

            ";
            $buscar = $this->connection->prepare($sql);
            $buscar->execute([
                ':nome' => '%' . strtolower($nome) . '%',
                ':grupo' => $grupo
            ]);
            return $buscar->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>