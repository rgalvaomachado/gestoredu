<?php
    class Presenca extends Database{
        protected $table = 'presenca';

        public $cod_usuario;
        public $cod_grupo;
        public $cod_disciplina;
        public $cod_sala;
        public $presente;
        public $data;
        public $data_final;

        function verificarPresenca(){
            $verificarPresenca =  $this->connection->prepare('
                SELECT * 
                FROM presenca 
                WHERE 
                    cod_usuario = :cod_usuario 
                    AND cod_disciplina = :cod_disciplina 
                    AND cod_sala = :cod_sala 
                    AND data = :data
            ');
            $verificarPresenca->execute([
                ':cod_usuario'      => isset($this->cod_usuario) ? $this->cod_usuario : 0,
                ':cod_disciplina'   => isset($this->cod_disciplina) ? $this->cod_disciplina : 0,
                ':cod_sala'         => isset($this->cod_sala) ? $this->cod_sala : 0,
                ':data'             => $this->data,
            ]);
            return $verificarPresenca->fetchAll(PDO::FETCH_ASSOC);
        } 

        function criarPresenca(){
            $stmt = $this->connection->prepare('
                INSERT INTO presenca (cod_usuario, cod_grupo, cod_disciplina, cod_sala, presente, data)
                VALUES(:cod_usuario, :cod_grupo, :cod_disciplina, :cod_sala, :presente, :data)
            ');
            $stmt->execute([
                ':cod_usuario' => isset($this->cod_usuario) ? $this->cod_usuario : 0,
                ':cod_grupo' => isset($this->cod_grupo) ? $this->cod_grupo : 0,
                ':cod_disciplina' => isset($this->cod_disciplina) ? $this->cod_disciplina : 0,
                ':cod_sala' => isset($this->cod_sala) ? $this->cod_sala : 0,
                ':presente' => $this->presente,
                ':data' => $this->data,
            ]);
        }

        function getPresencaPeriodo(){
            $getPresencaPeriodo =  $this->connection->prepare('
                SELECT *
                FROM presenca
                WHERE 
                    cod_usuario = :cod_usuario 
                    AND cod_grupo = :cod_grupo 
                    AND cod_disciplina = :cod_disciplina 
                    AND cod_sala = :cod_sala 
                    AND data BETWEEN :data AND :data_final 
                    AND presente = \'S\'
            ');
            $getPresencaPeriodo->execute([
                ':cod_usuario'      => $this->cod_usuario,
                ':cod_grupo'        => $this->cod_grupo,
                ':cod_disciplina'   => $this->cod_disciplina,
                ':cod_sala'         => $this->cod_sala,
                ':data'             => $this->data,
                ':data_final'       => $this->data_final,
            ]);
            return $getPresencaPeriodo->fetchAll(PDO::FETCH_ASSOC);
        } 

        function getAusenciaPeriodo(){
            $getAusenciaPeriodo =  $this->connection->prepare('
                SELECT *
                FROM presenca
                WHERE 
                    cod_usuario = :cod_usuario 
                    AND cod_grupo = :cod_grupo 
                    AND cod_disciplina = :cod_disciplina 
                    AND cod_sala = :cod_sala 
                    AND data BETWEEN :data AND :data_final 
                    AND presente = \'N\'
            ');
            $getAusenciaPeriodo->execute([
                ':cod_usuario'      => $this->cod_usuario,
                ':cod_grupo'        => $this->cod_grupo,
                ':cod_disciplina'   => $this->cod_disciplina,
                ':cod_sala'         => $this->cod_sala,
                ':data'             => $this->data,
                ':data_final'       => $this->data_final,
            ]);
            return $getAusenciaPeriodo->fetchAll(PDO::FETCH_ASSOC);
        } 
        
        function getJustificadoPeriodo(){
            $getJustificadoPeriodo =  $this->connection->prepare('
                SELECT *
                FROM presenca
                WHERE 
                    cod_usuario = :cod_usuario 
                    AND cod_grupo = :cod_grupo 
                    AND cod_disciplina = :cod_disciplina 
                    AND cod_sala = :cod_sala 
                    AND data BETWEEN :data AND :data_final 
                    AND presente = \'J\'
            ');
            $getJustificadoPeriodo->execute([
                ':cod_usuario'      => $this->cod_usuario,
                ':cod_grupo'        => $this->cod_grupo,
                ':cod_disciplina'   => $this->cod_disciplina,
                ':cod_sala'         => $this->cod_sala,
                ':data'             => $this->data,
                ':data_final'       => $this->data_final,
            ]);
            return $getJustificadoPeriodo->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>