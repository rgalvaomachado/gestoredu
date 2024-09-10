<?php
    include_once('Database.php');
    include_once('src/model/Grupo.php');
    include_once('src/model/Disciplina.php');
    include_once('src/model/Sala.php');

    class UsuarioGrupo extends Database{
        public $id;
        public $cod_usuario;
        public $cod_grupo;

        function usuario_grupo_buscar(){
            $buscar = $this->bd->prepare('SELECT cod_grupo FROM usuario_grupo where cod_usuario = :cod_usuario');
            $buscar->execute([
                ':cod_usuario' => $this->cod_usuario
            ]);
            $usuario_grupo = $buscar->fetchAll(PDO::FETCH_ASSOC);
            $grupos = [];
            foreach ($usuario_grupo as $grupo) {
                $grupos[] = $grupo['cod_grupo'];
            }
            return $grupos;
        }
        
        function usuario_grupo_criar(){
            $criar = $this->bd->prepare('INSERT INTO usuario_grupo (cod_usuario, cod_grupo) VALUES(:cod_usuario, :cod_grupo)');
            $criar->execute([
                ':cod_usuario' => $this->cod_usuario,
                ':cod_grupo' => $this->cod_grupo,
            ]);
        }

        function usuario_grupo_deletar(){
            $deletar = $this->bd->prepare('DELETE FROM usuario_grupo where cod_usuario = :cod_usuario');
            $deletar->execute([
              ':cod_usuario' => $this->cod_usuario,
            ]);
        }
    }
?>