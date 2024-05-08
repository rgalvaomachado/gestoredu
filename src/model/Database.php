<?php
    class Database{
        public $bd;
        public $err;
        public $username;   // Usuário do banco de dados
        public $password;   // Senha do banco de dados
        public $host;       // Endereço IP do banco de dados
        public $dataBase;   // Nome do banco de dados
        
        function __construct(){
            $this->username = $_ENV['DATABASE_USERNAME'];
            $this->password = $_ENV['DATABASE_PASSWORD'];
            $this->host     = $_ENV['DATABASE_HOST'];
            $this->dataBase = $_ENV['DATABASE_NAME'];

            try {
                $this->bd = new PDO('mysql:host='.$this->host.';dbname='.$this->dataBase,$this->username,$this->password);
                $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $err ) {
                echo $this->err->getCode();
                echo $this->err->getMessage();
            }
        }
    }
?>