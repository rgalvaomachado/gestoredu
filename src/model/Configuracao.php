<?php
    include_once('Database.php');

    class Configuracao extends Database{
        public $id;
        public $chave;
        public $valor;

        function buscarTodos(){
            $get =  $this->bd->prepare('SELECT id, chave, valor FROM configuracao');
            $get->execute();
            return $get->fetchAll(PDO::FETCH_ASSOC);
        }

        function configurar(){
            $verificar = $this->bd->prepare('SELECT COUNT(*) FROM configuracao WHERE `chave` = :chave');
            $verificar->execute([
                ':chave' => $this->chave,
            ]);
            $existe = $verificar->fetchColumn();
        
            if ($existe > 0) {
                $config = $this->bd->prepare('UPDATE configuracao SET `chave` = :chave, `valor` = :valor WHERE chave = :chave');
                $config->execute([
                    ':chave' => $this->chave,
                    ':valor' => $this->valor,
                ]);
            } else {
                $config = $this->bd->prepare('INSERT INTO configuracao (`chave`, valor) VALUES(:chave, :valor)');
                $config->execute([
                    ':chave' => $this->chave,
                    ':valor' => $this->valor,
                ]);
            }

            return $config->fetch(PDO::FETCH_ASSOC);      
        }

    }
?>