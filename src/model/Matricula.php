<?php
    class Matricula extends Database{
        protected $table = 'usuario_sala_disciplina';
    
        public $id;
        public $cod_usuario;
        public $cod_sala;
        public $cod_disciplina;

        function buscar(){
            $sql = "
                SELECT 
                    usuario_sala_disciplina.id as matricula, 
                    usuario.*, 
                    usuario_sala_disciplina.cod_sala, 
                    sala.nome as nome_sala, 
                    usuario_sala_disciplina.cod_disciplina, 
                    disciplina.nome as nome_disciplina
                FROM 
                    usuario_sala_disciplina
                INNER JOIN usuario ON usuario_sala_disciplina.cod_usuario = usuario.id
                INNER JOIN sala ON usuario_sala_disciplina.cod_sala = sala.id
                INNER JOIN disciplina ON usuario_sala_disciplina.cod_disciplina = disciplina.id
            ";
            
            $conditions = [];
            $params = [];

            if ($this->cod_usuario) {
                $conditions[] = "usuario_sala_disciplina.cod_usuario = :cod_usuario";
                $params[':cod_usuario'] = $this->cod_usuario;
            }

            if ($this->cod_sala) {
                $conditions[] = "usuario_sala_disciplina.cod_sala = :cod_sala";
                $params[':cod_sala'] = $this->cod_sala;
            }

            if ($this->cod_disciplina) {
                $conditions[] = "usuario_sala_disciplina.cod_disciplina = :cod_disciplina";
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
                $buscar = $this->read([
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

            $existentes = $this->read([
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