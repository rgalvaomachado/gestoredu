<?php
    class Certificado extends Database{
        protected $table = 'certificado';
        
        public $id;
        public $nome;
        public $conteudo;
        public $tamanho_letra;
    }
?>