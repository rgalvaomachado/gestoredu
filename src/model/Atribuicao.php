<?php
    class Atribuicao extends Database{
        protected $table = 'atribuicao';
    
        public $id;
        public $cod_usuario;
        public $cod_sala;
        public $cod_disciplina;

        function buscar(){
            $sql = "
                SELECT 
                    ". $this->table .".id as atribuicao, 
                    usuario.*, 
                    ". $this->table .".cod_sala, 
                    sala.nome as nome_sala, 
                    ". $this->table .".cod_disciplina, 
                    disciplina.nome as nome_disciplina
                FROM 
                    ". $this->table ."
                INNER JOIN usuario ON ". $this->table .".cod_usuario = usuario.id
                INNER JOIN sala ON ". $this->table .".cod_sala = sala.id
                INNER JOIN disciplina ON ". $this->table .".cod_disciplina = disciplina.id
            ";
            
            if ($this->cod_usuario) {
                $sql .= "WHERE cod_usuario = ". $this->cod_usuario;
            }

            if ($this->cod_sala) {
                $sql .= "WHERE cod_sala = ". $this->cod_sala;
            }

            if ($this->cod_disciplina) {
                $sql .= "WHERE cod_disciplina = ". $this->cod_disciplina;
            }
            
            $buscar = $this->connection->prepare($sql);
            $buscar->execute();
            $atribuicoes = $buscar->fetchAll(PDO::FETCH_ASSOC);
            return $atribuicoes;
        }

        function vinculo($atribuicoes){
            $vinculo = 0;
            foreach ($atribuicoes as $atribuicao) {
                $buscar = $this->read([
                    'cod_usuario' => $this->cod_usuario,
                    'cod_sala' => $atribuicao->cod_sala,
                    'cod_disciplina' => $atribuicao->cod_disciplina,
                ]);
                if (!$buscar) {
                    $this->create([
                        'cod_usuario' => $this->cod_usuario,
                        'cod_sala' => $atribuicao->cod_sala,
                        'cod_disciplina' => $atribuicao->cod_disciplina,
                    ]);
                    $vinculo++;
                }
            }

            $atribuicoesBanco = $this->read([
                'cod_usuario' => $this->cod_usuario
            ]);
            foreach ($atribuicoesBanco as $item1) {
                $found = false;
                foreach ($atribuicoes as $item2) {
                    if (
                        $item1['cod_usuario'] == $this->cod_usuario &&
                        $item1['cod_sala'] == $item2->cod_sala &&
                        $item1['cod_disciplina'] == $item2->cod_disciplina
                    ) {
                        $found = true;
                        break;
                    }
                }
        
                if (!$found) {
                    $excluirMatricula[] = $item1;
                    $this->delete($item1);
                    $vinculo++;
                }
            }

            return $vinculo;
        }
    }
?>