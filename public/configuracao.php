<?php
	include_once('src/controller/ConfiguracaoController.php');

    $ConfiguracaoController = new ConfiguracaoController();

    foreach ($ConfiguracaoController->chaves as $chave) {
        ${$chave} = 0;
    }

    $Configuracoes = json_decode($ConfiguracaoController->buscarTodos([]));

    foreach ($Configuracoes->configuracao as $configuracao) {
        if (in_array($configuracao->chave, $ConfiguracaoController->chaves)) {
            ${$configuracao->chave} = $configuracao->valor;
        }
    }
?>