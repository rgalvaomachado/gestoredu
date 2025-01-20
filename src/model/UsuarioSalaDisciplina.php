<?php
    include_once('Model.php');

    class UsuarioSalaDisciplina extends Model{
        public $id;
        public $cod_usuario;
        public $cod_sala;
        public $cod_disciplina;

        function usuario_sala_disciplina_buscar(){
            $buscar = $this->bd->prepare('SELECT cod_disciplina FROM usuario_sala_disciplina where cod_usuario = :cod_usuario AND cod_sala = :cod_sala');
            $buscar->execute([
                ':cod_usuario' => $this->cod_usuario,
                ':cod_sala' => $this->cod_sala
            ]);
            $usuario_disciplina = $buscar->fetchAll(PDO::FETCH_ASSOC);
            $disciplinas = [];
            foreach ($usuario_disciplina as $disciplina) {
                $disciplinas[] = $disciplina['cod_disciplina'];
            }
            return $disciplinas;
        }
        
        function usuario_sala_disciplina_criar(){
            $criar = $this->bd->prepare('INSERT INTO usuario_sala_disciplina (cod_usuario, cod_sala, cod_disciplina) VALUES(:cod_usuario, :cod_sala, :cod_disciplina)');
            $criar->execute([
                ':cod_usuario' => $this->cod_usuario,
                ':cod_sala' => $this->cod_sala,
                ':cod_disciplina' => $this->cod_disciplina,
            ]);
        }

        function usuario_sala_disciplina_deletar(){
            $deletar = $this->bd->prepare('DELETE FROM usuario_sala_disciplina where cod_usuario = :cod_usuario AND cod_sala = :cod_sala');
            $deletar->execute([
              ':cod_usuario' => $this->cod_usuario,
              ':cod_sala' => $this->cod_sala
            ]);
        }
    }
?>