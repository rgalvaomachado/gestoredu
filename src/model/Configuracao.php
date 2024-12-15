<?php
    class Configuracao extends Database{
        protected $table = 'configuracao';

        public $id;
        public $chave;
        public $valor;

        function configurar()
        {
            $atualizar = $this->readFirst([
                'chave' => $this->chave
            ]);

            if ($atualizar > 0) {
                $this->update(
                    [
                        'valor' => $this->valor,
                    ],
                    [
                        'chave' => $this->chave,
                    ]
                );
            } else {
                $this->create([
                    'chave' => $this->chave,
                    'valor' => $this->valor,
                ]);
            }
        }
    }
