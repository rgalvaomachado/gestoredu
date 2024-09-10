<?php
    include_once('Database.php');

    class UsuarioDisciplina extends Database{
        public $id;
        public $cod_usuario;
        public $cod_disciplina;

        function usuario_disciplina_buscar(){
            $buscar = $this->bd->prepare('SELECT cod_disciplina FROM usuario_disciplina where cod_usuario = :cod_usuario');
            $buscar->execute([
                ':cod_usuario' => $this->cod_usuario
            ]);
            $usuario_disciplina = $buscar->fetchAll(PDO::FETCH_ASSOC);
            $disciplinas = [];
            foreach ($usuario_disciplina as $disciplina) {
                $disciplinas[] = $disciplina['cod_disciplina'];
            }
            return $disciplinas;
        }
        
        function usuario_disciplina_criar(){
            $criar = $this->bd->prepare('INSERT INTO usuario_disciplina (cod_usuario, cod_disciplina) VALUES(:cod_usuario, :cod_disciplina)');
            $criar->execute([
                ':cod_usuario' => $this->cod_usuario,
                ':cod_disciplina' => $this->cod_disciplina,
            ]);
        }

        function usuario_disciplina_deletar(){
            $deletar = $this->bd->prepare('DELETE FROM usuario_disciplina where cod_usuario = :cod_usuario');
            $deletar->execute([
              ':cod_usuario' => $this->cod_usuario,
            ]);
        }
    }
?>