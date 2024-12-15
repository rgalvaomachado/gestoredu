<?php
    class ConfiguracaoController{
        public $chaves = [
            'tipo_frequencia',
            'frequencia',
            'multi_chamada',
    
            'aluno_trabalho',
            'aluno_nascimento',
            'aluno_rg',
            'aluno_cpf',
            'aluno_endereco',
            'aluno_telefone',
    
            'professor_telefone',
            'professor_nascimento',
            'professor_rg',
            'professor_cpf',
            'professor_endereco',
        ];

        function buscarTodos($post){
            $Configuracao = new Configuracao();
            $buscarConfiguracao = $Configuracao->read();

            if(!empty($buscarConfiguracao)){
                return json_encode([
                    "access" => true,
                    "configuracao" => $buscarConfiguracao,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Configuracao não encontrado"
                ]);
            }
        }

        function buscar($post){
            $Configuracao = new Configuracao();
            $buscarConfiguracao = $Configuracao->readFirst([
                'chave' => $post['chave']
            ]);

            if(!empty($buscarConfiguracao)){
                return json_encode([
                    "access" => true,
                    "configuracao" => $buscarConfiguracao,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Configuracao não encontrado"
                ]);
            }
        }

        function configurar($post){
            unset($post['metodo']);
            foreach ($post as $key => $value) {
                $configuracao = new Configuracao();
                $configuracao->chave = $key;
                $configuracao->valor = $value;
                $configuracao->configurar();
            }
            return json_encode([
                "access" => true,
                "message" => "Criado com sucesso"
            ]);
        }
    }
?>