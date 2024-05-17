<?php
    include_once('src/model/Configuracao.php');

    class ConfiguracaoController{
        function buscarTodos($post){
            $Configuracao = new Configuracao();
            $buscarConfiguracao = $Configuracao->buscarTodos();

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