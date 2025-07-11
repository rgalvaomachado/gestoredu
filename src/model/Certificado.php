<?php
    class Certificado extends Model{
        protected $table = 'certificado';
        
        public $id;
        public $nome;
        public $cod_sala;
        public $cod_disciplina;
        public $conteudo;
        public $tamanho_letra;

        function buscarTodos(){
            $sql = "
                SELECT 
                    certificado.*, 
                    grupo.nome as nome_grupo,
                    sala.nome as nome_sala, 
                    disciplina.nome as nome_disciplina
                FROM certificado
                LEFT JOIN grupo ON certificado.cod_grupo = grupo.id
                LEFT JOIN sala ON certificado.cod_sala = sala.id
                LEFT JOIN disciplina ON certificado.cod_disciplina = disciplina.id
            ";
            $buscar = $this->connection->prepare($sql);
            $buscar->execute();
            return $buscar->fetchAll(PDO::FETCH_ASSOC);
        }

        function buscar($post){
            $sql = "
                SELECT 
                    certificado.*,
                    grupo.nome as nome_grupo,
                    sala.nome as nome_sala,
                    disciplina.nome as nome_disciplina
                FROM certificado
                LEFT JOIN grupo ON certificado.cod_grupo = grupo.id
                LEFT JOIN sala ON certificado.cod_sala = sala.id
                LEFT JOIN disciplina ON certificado.cod_disciplina = disciplina.id
            ";

            $conditions = [];
            $params = [];

            if ($post['id']) {
                $conditions[] = "certificado.id = :id";
                $params[':id'] = $post['id'];
            }

             if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            $buscar = $this->connection->prepare($sql);
            $buscar->execute($params);
            return $buscar->fetch(PDO::FETCH_ASSOC);
        }
    }
?>