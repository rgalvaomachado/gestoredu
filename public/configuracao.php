<?php
	include_once('src/controller/ConfiguracaoController.php');
    $ConfiguracaoController = new ConfiguracaoController();
    $ConfiguracaoController = json_decode($ConfiguracaoController->buscarTodos([]));
    var_dump($ConfiguracaoController->configuracao);
    foreach ($ConfiguracaoController->configuracao as $configuracao) {
        switch ($configuracao->chave) {
            case 'tipo_frequencia':
                $tipo_frequencia = $configuracao->valor;
                break;
            case 'frequencia':
                $frequencia = $configuracao->valor;
                break;
            case 'aluno_nascimento':
                $aluno_nascimento = $configuracao->valor;
                break;
            case 'aluno_rg':
                $aluno_rg = $configuracao->valor;
                break;
            case 'aluno_cpf':
                $aluno_cpf = $configuracao->valor;
                break;
            case 'aluno_endereco':
                $aluno_endereco = $configuracao->valor;
                break;
            case 'aluno_telefone':
                $aluno_telefone = $configuracao->valor;
                break;
            case 'professor_telefone':
                $professor_telefone = $configuracao->valor;
                break;
            case 'professor_nascimento':
                $professor_nascimento = $configuracao->valor;
                break;
            case 'professor_rg':
                $professor_rg = $configuracao->valor;
                break;
            case 'professor_cpf':
                $professor_cpf = $configuracao->valor;
                break;
            case 'professor_endereco':
                $professor_endereco = $configuracao->valor;
                break;
        }
    }
?>