<?php
    include_once('Database.php');

    class Configuracao extends Database{
        public $id;
        public $tipo_frequencia;
        public $frequencia;

        function buscar(){
            $get =  $this->bd->prepare('SELECT id, tipo_frequencia, frequencia FROM configuracao WHERE id = :id');
            $get->execute([
                ':id' => $this->id,
            ]);
            return $get->fetch(PDO::FETCH_ASSOC);
        }

        function configurar(){
            $get =  $this->bd->prepare('SELECT id FROM configuracao WHERE id = :id');
            $get->execute([
                ':id' => $this->id,
            ]);
            $configuracao = $get->fetch(PDO::FETCH_ASSOC);
            if ($configuracao) {
                $editar = $this->bd->prepare('UPDATE configuracao SET tipo_frequencia = :tipo_frequencia, frequencia = :frequencia WHERE id = :id');
                $editar->execute([
                  ':id'   => $this->id,
                  ':tipo_frequencia' => $this->tipo_frequencia,
                  ':frequencia' => $this->frequencia,
                ]);
                return $editar->rowCount();
            } else {
                $criar = $this->bd->prepare('INSERT INTO configuracao (id, tipo_frequencia, frequencia) VALUES(:id, :tipo_frequencia, :frequencia)');
                $criar->execute([
                    ':id'   => $this->id,
                    ':tipo_frequencia' => $this->tipo_frequencia,
                    ':frequencia' => $this->frequencia,
                ]);
                return $this->bd->lastInsertId();
            }
        }

    }
?>