<?php
    include_once('Database.php');

    class SalaDisciplina extends Database{
        public $id;
        public $cod_sala;
        public $cod_disciplina;

        function sala_disciplina_buscar(){
            $buscar = $this->bd->prepare('SELECT cod_disciplina FROM sala_disciplina where cod_sala = :cod_sala');
            $buscar->execute([
                ':cod_sala' => $this->cod_sala
            ]);
            $usuario_disciplina = $buscar->fetchAll(PDO::FETCH_ASSOC);
            $disciplinas = [];
            foreach ($usuario_disciplina as $disciplina) {
                $disciplinas[] = $disciplina['cod_disciplina'];
            }
            return $disciplinas;
        }
        
        function sala_disciplina_criar(){
            $criar = $this->bd->prepare('INSERT INTO sala_disciplina (cod_sala, cod_disciplina) VALUES(:cod_sala, :cod_disciplina)');
            $criar->execute([
                ':cod_sala' => $this->cod_sala,
                ':cod_disciplina' => $this->cod_disciplina,
            ]);
        }

        function sala_disciplina_deletar(){
            $deletar = $this->bd->prepare('DELETE FROM sala_disciplina where cod_sala = :cod_sala');
            $deletar->execute([
              ':cod_sala' => $this->cod_sala,
            ]);
        }
    }
?>