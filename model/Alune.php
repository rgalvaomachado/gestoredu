<?php
    include_once('Database.php');

    class Alune extends Database{
        public $nome;
        public $sala;

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO alune (nome, cod_sala) VALUES(:nome, :cod_sala)');
            $criar->execute([
                ':nome' => $this->nome,
                ':cod_sala' => $this->sala,
            ]);
            return $this->bd->lastInsertId();
        }

        function getAlunes(){
            $getAlunes =  $this->bd->prepare('SELECT id, nome, cod_sala FROM alune ORDER BY nome ASC');
            $getAlunes->execute();
            return $getAlunes->fetchAll(PDO::FETCH_ASSOC);
        }

        function getAlune($id){
            $getAlune =  $this->bd->prepare('SELECT id, nome, cod_sala FROM alune WHERE id = :id ');
            $getAlune->execute([
                ':id' => $id,
            ]);
            return $getAlune->fetch(PDO::FETCH_ASSOC);
        }

        function getAlunesSala(){
            $getAlunesSala =  $this->bd->prepare('SELECT id, nome FROM alune WHERE cod_sala = :cod_sala ORDER BY nome ASC');
            $getAlunesSala->execute([
                ':cod_sala' => $this->sala
            ]);
            return $getAlunesSala->fetchAll(PDO::FETCH_ASSOC);
        }

        function salvar($id){
            $salvar = $this->bd->prepare('UPDATE alune SET nome = :nome, cod_sala = :cod_sala WHERE id = :id');
            $salvar->execute(array(
              ':id'   => $id,
              ':nome' => $this->nome,
              ':cod_sala' => $this->sala
            ));
            return $salvar->rowCount();
        }

        function excluir(){
            $excluir = $this->bd->prepare('DELETE FROM alune where id = :id');
            $excluir->execute([
              ':id' => $this->id,
            ]);
            return $excluir->rowCount();
        }
    }
?>