<?php
    class Projeto extends Model{
        protected $table = 'projeto';
        
        public $id;
        public $nome;
        public $cod_usuario;
        public $cod_disciplina;
        public $cod_sala;

        function buscarProjetosUsuario($post){
            $sql = "
                SELECT
                    projeto.*, 
                    sala.nome as nome_sala, 
                    disciplina.nome as nome_disciplina
                FROM 
                    projeto
                INNER JOIN usuario ON projeto.cod_usuario = usuario.id
                INNER JOIN sala ON projeto.cod_sala = sala.id
                INNER JOIN disciplina ON projeto.cod_disciplina = disciplina.id
            ";
            
            $conditions = [];
            $params = [];

            if (isset($post['cod_usuario'])) {
                $conditions[] = "projeto.cod_usuario = :cod_usuario";
                $params[':cod_usuario'] = $post['cod_usuario'];
            }

            if (isset($post['cod_sala'])) {
                $conditions[] = "projeto.cod_sala = :cod_sala";
                $params[':cod_sala'] = $post['cod_sala'];
            }

            if (isset($post['cod_disciplina'])) {
                $conditions[] = "projeto.cod_disciplina = :cod_disciplina";
                $params[':cod_disciplina'] =$post['cod_disciplina'];
            }

            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }
            
            $buscar = $this->connection->prepare($sql);
            $buscar->execute($params);
            $projetosUsuario = $buscar->fetchAll(PDO::FETCH_ASSOC);
            return $projetosUsuario;
        }

        function vinculo($projetos){
            $vinculo = 0;
            foreach ($projetos as $projeto) {
                $buscar = $this->searchAll([
                    'cod_usuario' => $this->cod_usuario,
                    'nome' => $projeto->nome,
                    'cod_sala' => $projeto->cod_sala,
                    'cod_disciplina' => $projeto->cod_disciplina,
                ]);
                if (!$buscar) {
                    $this->create([
                        'cod_usuario' => $this->cod_usuario,
                        'nome' => $projeto->nome,
                        'cod_sala' => $projeto->cod_sala,
                        'cod_disciplina' => $projeto->cod_disciplina,
                    ]);
                    $vinculo++;
                }
            }

            $existentes = $this->searchAll([
                'cod_usuario' => $this->cod_usuario
            ]);
            foreach ($existentes as $existe) {
                $found = false;
                foreach ($projetos as $projeto) {
                    if (
                        $existe['cod_usuario'] == $this->cod_usuario &&
                        $existe['nome'] == $projeto->nome &&
                        $existe['cod_sala'] == $projeto->cod_sala &&
                        $existe['cod_disciplina'] == $projeto->cod_disciplina
                    ) {
                        $found = true;
                        break;
                    }
                }
        
                if (!$found) {
                    $this->delete($existe);
                    $vinculo++;
                }
            }

            return $vinculo;
        }
    }
?>