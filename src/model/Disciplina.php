<?php
    include_once('Database.php');

    class Disciplina extends Database{
        public $id;
        public $nome;
        public $cod_usuario;

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO disciplina (nome) VALUES(:nome)');
            $criar->execute([
                ':nome' => $this->nome,
            ]);
            return $this->bd->lastInsertId();
        }

        function buscarTodos(){
            $getTodos =  $this->bd->prepare('SELECT id, nome FROM disciplina ORDER BY nome ASC');
            $getTodos->execute();
            return $getTodos->fetchAll(PDO::FETCH_ASSOC);
        }

        function buscar(){
            $get =  $this->bd->prepare('SELECT id, nome FROM disciplina WHERE id = :id ORDER BY nome ASC');
            $get->execute([
                ':id' => $this->id,
            ]);
            return $get->fetch(PDO::FETCH_ASSOC);
        }

        function editar(){
            $editar = $this->bd->prepare('UPDATE disciplina SET nome = :nome WHERE id = :id');
            $editar->execute([
              ':id'   => $this->id,
              ':nome' => $this->nome,
            ]);
            return $editar->rowCount();
        }

        function deletar(){
            $deletar = $this->bd->prepare('DELETE FROM disciplina where id = :id');
            $deletar->execute([
              ':id' => $this->id,
            ]);
            return $deletar->rowCount();
        }

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
                ':cod_disciplina' => $this->id,
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