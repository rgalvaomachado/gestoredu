<?php
include_once('src/controller/ConfiguracaoController.php');

// Inicializa o controlador de configuração
$ConfiguracaoController = new ConfiguracaoController();

// Obtém a resposta JSON das configurações
$response = $ConfiguracaoController->buscarTodos([]);

// Decodifica a resposta JSON
$decodedResponse = json_decode($response);

// Verifica se a decodificação JSON foi bem-sucedida
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Erro ao decodificar JSON: " . json_last_error_msg());
}

// Verifica se 'configuracao' existe e é iterável
if (isset($decodedResponse->configuracao) && (is_array($decodedResponse->configuracao) || $decodedResponse->configuracao instanceof Traversable)) {
    foreach ($decodedResponse->configuracao as $configuracao) {
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
} else {
    // Tratar o caso onde 'configuracao' não é iterável ou não existe
    echo "A resposta 'configuracao' não é um array ou objeto iterável, ou não existe.";
}
?>