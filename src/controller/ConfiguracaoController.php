<?php
    include_once('src/model/Configuracao.php');

    class ConfiguracaoController{
        function buscar($post){
            $Configuracao = new Configuracao();
            $Configuracao->id = 1;
            $buscarConfiguracao = $Configuracao->buscar();

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
            $configuracao = new Configuracao();
            $configuracao->id = 1;
            $configuracao->tipo_frequencia = $post['tipo_frequencia'];
            $configuracao->frequencia = $post['frequencia'];
            $id = $configuracao->configurar();
            if ($id > 0){
                return json_encode([
                    "access" => true,
                    "message" => "Criado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro no cadastro"
                ]);
            }
            
        }
    }
?>