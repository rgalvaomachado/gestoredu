<?php
    include_once('Database.php');

    class Presenca extends BD{
        public $cod_alune;
        public $cod_sala;
        public $cod_tutore;
        public $cod_monitore;
        public $aula;
        public $presente;
        public $data;
        public $data_final;

        function criarPresenca(){
            $stmt = $this->bd->prepare('
                INSERT INTO presenca (cod_alune, cod_sala, cod_tutore, cod_monitore, aula, presente, data)
                VALUES(:cod_alune, :cod_sala, :cod_tutore, :cod_monitore, :aula, :presente, :data)
            ');
            $stmt->execute([
                ':cod_sala' => isset($this->cod_sala) ? $this->cod_sala : 0,
                ':cod_monitore' => isset($this->cod_monitore) ? $this->cod_monitore : 0,
                ':cod_tutore' => isset($this->cod_tutore) ? $this->cod_tutore : 0,
                ':cod_alune' => isset($this->cod_alune) ? $this->cod_alune : 0,
                ':aula' => isset($this->aula) ? $this->aula : 0,
                ':presente' => $this->presente,
                ':data' => $this->data,
            ]);
        }

        function justificarPresenca(){
            $stmt = $this->bd->prepare('
                UPDATE presenca
                SET presente = :presente 
                WHERE 
                    cod_sala = :cod_sala 
                    AND cod_monitore = :cod_monitore 
                    AND cod_tutore = :cod_tutore 
                    AND cod_alune = :cod_alune
                    AND data = :data
                    AND aula = :aula
            ');
            $stmt->execute([
                ':cod_sala' => isset($this->cod_sala) ? $this->cod_sala : 0,
                ':cod_monitore' => isset($this->cod_monitore) ? $this->cod_monitore : 0,
                ':cod_tutore' => isset($this->cod_tutore) ? $this->cod_tutore : 0,
                ':cod_alune' => isset($this->cod_alune) ? $this->cod_alune : 0,
                ':aula' => isset($this->aula) ? $this->aula : 0,
                ':presente' => $this->presente,
                ':data' => $this->data,
            ]);
        }

        function getPresencaPeriodo(){
            $getPresencaPeriodo =  $this->bd->prepare('
                SELECT *
                FROM presenca
                WHERE 
                    cod_sala = :cod_sala 
                    AND cod_monitore = :cod_monitore 
                    AND cod_tutore = :cod_tutore 
                    AND cod_alune = :cod_alune 
                    AND data BETWEEN :data AND :data_final 
                    AND presente = \'S\'
            ');
            $getPresencaPeriodo->execute([
                ':cod_sala' => $this->cod_sala,
                ':cod_monitore' => $this->cod_monitore,
                ':cod_tutore' => $this->cod_tutore,
                ':cod_alune' => $this->cod_alune,
                ':data' => $this->data,
                ':data_final' => $this->data_final,
            ]);
            return $getPresencaPeriodo->fetchAll(PDO::FETCH_ASSOC);
        } 

        function getAusenciaPeriodo(){
            $getAusenciaPeriodo =  $this->bd->prepare('
                SELECT *
                FROM presenca
                WHERE 
                    cod_sala = :cod_sala 
                    AND cod_monitore = :cod_monitore 
                    AND cod_tutore = :cod_tutore 
                    AND cod_alune = :cod_alune 
                    AND data BETWEEN :data AND :data_final 
                    AND presente = \'N\'
            ');
            $getAusenciaPeriodo->execute([
                ':cod_sala' => $this->cod_sala,
                ':cod_monitore' => $this->cod_monitore,
                ':cod_tutore' => $this->cod_tutore,
                ':cod_alune' => $this->cod_alune,
                ':data' => $this->data,
                ':data_final' => $this->data_final,
            ]);
            return $getAusenciaPeriodo->fetchAll(PDO::FETCH_ASSOC);
        } 
        
        function getJustificadoPeriodo(){
            $getJustificadoPeriodo =  $this->bd->prepare('
                SELECT *
                FROM presenca
                WHERE 
                    cod_sala = :cod_sala 
                    AND cod_monitore = :cod_monitore 
                    AND cod_tutore = :cod_tutore 
                    AND cod_alune = :cod_alune 
                    AND data BETWEEN :data AND :data_final 
                    AND presente = \'J\'
            ');
            $getJustificadoPeriodo->execute([
                ':cod_sala' => $this->cod_sala,
                ':cod_monitore' => $this->cod_monitore,
                ':cod_tutore' => $this->cod_tutore,
                ':cod_alune' => $this->cod_alune,
                ':data' => $this->data,
                ':data_final' => $this->data_final,
            ]);
            return $getJustificadoPeriodo->fetchAll(PDO::FETCH_ASSOC);
        }

        function verificarPresenca(){
            $verificarPresencaAlune =  $this->bd->prepare('
                SELECT * 
                FROM presenca 
                WHERE 
                    cod_sala = :cod_sala 
                    AND cod_monitore = :cod_monitore 
                    AND cod_tutore = :cod_tutore 
                    AND cod_alune = :cod_alune
                    AND data = :data
                    AND aula = :aula
            ');
            $verificarPresencaAlune->execute([
                ':cod_sala' => isset($this->cod_sala) ? $this->cod_sala : 0,
                ':cod_monitore' => isset($this->cod_monitore) ? $this->cod_monitore : 0,
                ':cod_tutore' => isset($this->cod_tutore) ? $this->cod_tutore : 0,
                ':cod_alune' => isset($this->cod_alune) ? $this->cod_alune : 0,
                ':aula' => isset($this->aula) ? $this->aula : 0,
                ':data' => $this->data,
            ]);
            return $verificarPresencaAlune->fetchAll(PDO::FETCH_ASSOC);
        } 

        function deletaPresencaAlune(){
            $stmt = $this->bd->prepare('DELETE FROM presenca where cod_alune = :cod_alune');
            $stmt->execute([
              ':cod_alune' => $this->cod_alune,
            ]);
        }
    }
?>