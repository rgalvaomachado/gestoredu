<?php
    include_once('Database.php');

    class Grupo extends Database{
        public $id;
        public $nome;
        public $cod_usuario;

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO grupo (nome) VALUES(:nome)');
            $criar->execute([
                ':nome' => $this->nome,
            ]);
            return $this->bd->lastInsertId();
        }

        function buscarTodos(){
            $getTodos =  $this->bd->prepare('SELECT id, nome FROM grupo ORDER BY nome ASC');
            $getTodos->execute();
            return $getTodos->fetchAll(PDO::FETCH_ASSOC);
        }

        function buscar(){
            $get =  $this->bd->prepare('SELECT id, nome FROM grupo WHERE id = :id ORDER BY nome ASC');
            $get->execute([
                ':id' => $this->id,
            ]);
            return $get->fetch(PDO::FETCH_ASSOC);
        }

        function editar(){
            $editar = $this->bd->prepare('UPDATE grupo SET nome = :nome WHERE id = :id');
            $editar->execute([
              ':id'   => $this->id,
              ':nome' => $this->nome,
            ]);
            return $editar->rowCount();
        }

        function deletar(){
            $deletar = $this->bd->prepare('DELETE FROM grupo where id = :id');
            $deletar->execute([
              ':id' => $this->id,
            ]);
            return $deletar->rowCount();
        }

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
                ':cod_grupo' => $this->id,
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