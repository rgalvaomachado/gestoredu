<?php
    class Certificado extends Model{
        protected $table = 'certificado';
        
        public $id;
        public $nome;
        public $conteudo;
        public $tamanho_letra;
    }
?>