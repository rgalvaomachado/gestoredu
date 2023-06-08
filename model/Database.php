<?php
    class Database{
        public $bd;
        public $err;
        public $username;   // Usuário do banco de dados
        public $password;   // Senha do banco de dados
        public $host;       // Endereço IP do banco de dados
        public $dataBase;   // Nome do banco de dados
        
        function __construct(){
            if ($_SERVER['HTTP_HOST'] == 'gestoredu.com') {
                $this->username = 'gestoredu';
                $this->password = 'UC*GQ1uhC4wbf$dc';
                $this->host     = 'gestoredu.com';
                $this->dataBase = 'gestoredu';
            } else {
                $this->username = 'root';
                $this->password = 'root';
                $this->host     = '127.0.0.1';
                $this->dataBase = 'gestoredu';
            }

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