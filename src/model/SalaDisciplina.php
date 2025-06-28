<?php
    class SalaDisciplina extends Model{
        protected $table = 'sala_disciplina';

        public $id;
        public $cod_sala;
        public $cod_disciplina;

        function buscar(){
            
            $sql = "
                SELECT disciplina.id as cod_disciplina, disciplina.nome as nome_disciplina
                FROM sala_disciplina
                INNER JOIN disciplina ON sala_disciplina.cod_disciplina = disciplina.id
                WHERE cod_sala = :cod_sala
            ";
            $buscar = $this->connection->prepare($sql);
            $buscar->execute([
                ':cod_sala' => $this->cod_sala
            ]);
            return $buscar->fetchAll(PDO::FETCH_ASSOC);
        }
        
        function vinculo($disciplinas){
            $vinculo = 0;
            foreach ($disciplinas as $disciplina) {
                $buscar = $this->searchAll([
                    'cod_sala' => $this->cod_sala,
                    'cod_disciplina' => $disciplina->cod_disciplina,
                ]);
                if (!$buscar) {
                    $this->create([
                        'cod_sala' => $this->cod_sala,
                        'cod_disciplina' => $disciplina->cod_disciplina,
                    ]);
                    $vinculo++;
                }
            }

            $existentes = $this->searchAll([
                'cod_sala' => $this->cod_sala
            ]);
            foreach ($existentes as $existe) {
                $encontrado = false;
                foreach ($disciplinas as $disciplina) {
                    if (
                        $existe['cod_sala'] == $this->cod_sala &&
                        $existe['cod_disciplina'] == $disciplina->cod_disciplina
                    ) {
                        $encontrado = true;
                        break;
                    }
                }
        
                if (!$encontrado) {
                    $this->delete($existe);
                    $vinculo++;
                }
            }

            return $vinculo;
        }
    }
?>