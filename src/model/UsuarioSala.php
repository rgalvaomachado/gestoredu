<?php
    include_once('Model.php');

    class UsuarioSala extends Model{
        public $id;
        public $cod_usuario;
        public $cod_sala;

        function usuario_sala_buscar(){
            $buscar = $this->bd->prepare('SELECT cod_sala FROM usuario_sala where cod_usuario = :cod_usuario');
            $buscar->execute([
                ':cod_usuario' => $this->cod_usuario
            ]);
            $usuario_sala = $buscar->fetchAll(PDO::FETCH_ASSOC);
            $salas = [];
            foreach ($usuario_sala as $sala) {
                $salas[] = $sala['cod_sala'];
            }
            return $salas;
        }
        
        function usuario_sala_criar(){
            $criar = $this->bd->prepare('INSERT INTO usuario_sala (cod_usuario, cod_sala) VALUES(:cod_usuario, :cod_sala)');
            $criar->execute([
                ':cod_usuario' => $this->cod_usuario,
                ':cod_sala' => $this->cod_sala,
            ]);
        }

        function usuario_sala_deletar(){
            $deletar = $this->bd->prepare('DELETE FROM usuario_sala where cod_usuario = :cod_usuario');
            $deletar->execute([
              ':cod_usuario' => $this->cod_usuario,
            ]);
        }
    }
?>