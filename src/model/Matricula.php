<?php
    class Matricula extends Model{
        protected $table = 'usuario_sala_disciplina';
        
        public $id;
        public $cod_usuario;
        public $cod_sala;
        public $cod_disciplina;

        function buscar(){
            $sql = "
                SELECT
                    {$this->table}.id as matricula,
                    usuario.*,
                    {$this->table}.cod_sala,
                    sala.nome as nome_sala,
                    {$this->table}.cod_disciplina,
                    disciplina.nome as nome_disciplina
                FROM
                    {$this->table}
                INNER JOIN usuario ON {$this->table}.cod_usuario = usuario.id
                INNER JOIN sala ON {$this->table}.cod_sala = sala.id
                INNER JOIN disciplina ON {$this->table}.cod_disciplina = disciplina.id
            ";
            
            $conditions = [];
            $params = [];

            if ($this->cod_usuario) {
                $conditions[] = "{$this->table}.cod_usuario = :cod_usuario";
                $params[':cod_usuario'] = $this->cod_usuario;
            }

            if ($this->cod_sala) {
                $conditions[] = "{$this->table}.cod_sala = :cod_sala";
                $params[':cod_sala'] = $this->cod_sala;
            }

            if ($this->cod_disciplina) {
                $conditions[] = "{$this->table}.cod_disciplina = :cod_disciplina";
                $params[':cod_disciplina'] = $this->cod_disciplina;
            }

            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }
            
            $buscar = $this->connection->prepare($sql);
            $buscar->execute($params);
            $matriculas = $buscar->fetchAll(PDO::FETCH_ASSOC);
            return $matriculas;
        }

        function vinculo($matriculas){
            $vinculo = 0;
            foreach ($matriculas as $matricula) {
                $buscar = $this->searchAll([
                    'cod_usuario' => $this->cod_usuario,
                    'cod_sala' => $matricula->cod_sala,
                    'cod_disciplina' => $matricula->cod_disciplina,
                ]);
                if (!$buscar) {
                    $this->create([
                        'cod_usuario' => $this->cod_usuario,
                        'cod_sala' => $matricula->cod_sala,
                        'cod_disciplina' => $matricula->cod_disciplina,
                    ]);
                    $vinculo++;
                }
            }

            $existentes = $this->searchAll([
                'cod_usuario' => $this->cod_usuario
            ]);
            foreach ($existentes as $existe) {
                $found = false;
                foreach ($matriculas as $matricula) {
                    if (
                        $existe['cod_usuario'] == $this->cod_usuario &&
                        $existe['cod_sala'] == $matricula->cod_sala &&
                        $existe['cod_disciplina'] == $matricula->cod_disciplina
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