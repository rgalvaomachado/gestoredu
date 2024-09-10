<?php
    include_once('Database.php');

    class Horario extends Database{
        public $id;
        public $cod_usuario;
        public $cod_sala;
        public $cod_disciplina;
        public $dia_semana;
        public $hora_inicio;
        public $hora_fim;
        public $cor;

        function criar(){
            $sql = "
                INSERT INTO horario (
                    cod_usuario,
                    cod_sala,
                    cod_disciplina,
                    dia_semana,
                    hora_inicio,
                    hora_fim,
                    cor
                ) VALUES (
                    :cod_usuario,
                    :cod_sala,
                    :cod_disciplina,
                    :dia_semana,
                    :hora_inicio,
                    :hora_fim,
                    :cor
                )
            ";
            $criar = $this->bd->prepare($sql);
            $criar->execute([
                ':cod_usuario' => $this->cod_usuario,
                ':cod_sala' => $this->cod_sala,
                ':cod_disciplina' => $this->cod_disciplina,
                ':dia_semana' => $this->dia_semana,
                ':hora_inicio' => $this->hora_inicio,
                ':hora_fim' => $this->hora_fim,
                ':cor' => $this->cor,
            ]);
            return $this->bd->lastInsertId();
        }

        function buscarTodos(){
            $sql = "
                SELECT 
                    horario.*, 
                    sala.nome as sala_nome, 
                    disciplina.nome as disciplina_nome, 
                    usuario.nome as usuario_nome,
                    TIMEDIFF(horario.hora_fim, horario.hora_inicio) AS duracao
                FROM horario
                LEFT JOIN sala ON sala.id = horario.cod_sala
                LEFT JOIN disciplina ON disciplina.id = horario.cod_disciplina
                LEFT JOIN usuario ON usuario.id = horario.cod_usuario
            ";

            $conditions = [];
            $params = [];
            
            if ($this->dia_semana) {
                $conditions[] = "dia_semana = :dia_semana";
                $params[':dia_semana'] = $this->dia_semana;
            }
            
            if ($this->cod_usuario) {
                $conditions[] = "cod_usuario = :cod_usuario";
                $params[':cod_usuario'] = $this->cod_usuario;
            }
            
            if ($this->cod_sala) {
                $conditions[] = "cod_sala = :cod_sala";
                $params[':cod_sala'] = $this->cod_sala;
            }

            if ($this->cod_disciplina) {
                $conditions[] = "cod_disciplina = :cod_disciplina";
                $params[':cod_disciplina'] = $this->cod_disciplina;
            }
            
            if (count($conditions) > 0) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }
            
            $sql .= " ORDER BY horario.dia_semana ASC, horario.hora_inicio ASC;";

            $getTodos = $this->bd->prepare($sql);
            $getTodos->execute($params);
            return $getTodos->fetchAll(PDO::FETCH_ASSOC);
        }

        function buscar(){
            $sql = "
                SELECT horario.*, sala.nome as sala_nome, usuario.nome as usuario_nome
                FROM horario
                LEFT JOIN sala ON sala.id = horario.cod_sala
                LEFT JOIN disciplina ON disciplina.id = horario.cod_disciplina
                LEFT JOIN usuario ON usuario.id = horario.cod_usuario
                WHERE horario.id = :id 
                ORDER BY hora_inicio ASC
            ";
            $get =  $this->bd->prepare($sql);
            $get->execute([
                ':id' => $this->id,
            ]);
            return $get->fetch(PDO::FETCH_ASSOC);
        }

        function editar(){
            $sql = "
                UPDATE horario 
                SET 
                    cod_usuario = :cod_usuario,
                    cod_sala = :cod_sala, 
                    cod_disciplina = :cod_disciplina, 
                    hora_inicio = :hora_inicio, 
                    hora_fim = :hora_fim, 
                    cor = :cor 
                WHERE id = :id
            ";
            $editar = $this->bd->prepare($sql);
            $editar->execute([
                ':id'   => $this->id,
                ':cod_usuario' => $this->cod_usuario,
                ':cod_sala' => $this->cod_sala,
                ':cod_disciplina' => $this->cod_disciplina,
                ':hora_inicio' => $this->hora_inicio,
                ':hora_fim' => $this->hora_fim,
                ':cor' => $this->cor,
            ]);
            return $editar->rowCount();
        }

        function deletar(){
            $sql = "
                DELETE FROM horario 
                where id = :id
            ";
            $deletar = $this->bd->prepare($sql);
            $deletar->execute([
              ':id' => $this->id,
            ]);
            return $deletar->rowCount();
        }
        
    }
?>