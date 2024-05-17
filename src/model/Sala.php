<?php
    include_once('Database.php');

    class Sala extends Database{
        public $id;
        public $nome;
        public $cod_usuario;

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO sala (nome) VALUES(:nome)');
            $criar->execute([
                ':nome' => $this->nome,
            ]);
            return $this->bd->lastInsertId();
        }

        function buscarTodos(){
            $getTodos =  $this->bd->prepare('SELECT id, nome FROM sala ORDER BY nome ASC');
            $getTodos->execute();
            return $getTodos->fetchAll(PDO::FETCH_ASSOC);
        }

        function buscar(){
            $get =  $this->bd->prepare('SELECT id, nome FROM sala WHERE id = :id ORDER BY nome ASC');
            $get->execute([
                ':id' => $this->id,
            ]);
            return $get->fetch(PDO::FETCH_ASSOC);
        }

        function editar(){
            $editar = $this->bd->prepare('UPDATE sala SET nome = :nome WHERE id = :id');
            $editar->execute([
              ':id'   => $this->id,
              ':nome' => $this->nome,
            ]);
            return $editar->rowCount();
        }

        function deletar(){
            $deletar = $this->bd->prepare('DELETE FROM sala where id = :id');
            $deletar->execute([
              ':id' => $this->id,
            ]);
            return $deletar->rowCount();
        }
        
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
                ':cod_sala' => $this->id,
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