<?php
include_once('PresencaController.php');
include_once('UsuarioController.php');
include_once('ConfiguracaoController.php');

class RelatorioController{
    function relatorioChamada($post){
        $UsuarioController = new UsuarioController();
        $buscarTodos = json_decode($UsuarioController->buscarTodos([
            "grupo" => $post['grupo'],
            "sala" => $post['sala'],
            "disciplina" => $post['disciplina']
        ]));
        $usuarios = $buscarTodos->usuarios;

        $ConfiguracaoController = new ConfiguracaoController();
        $ConfiguracaoController = json_decode($ConfiguracaoController->buscarTodos([]));
        foreach ($ConfiguracaoController->configuracao as $configuracao) {
            switch ($configuracao->chave) {
                case 'tipo_frequencia':
                    $config_tipo_frequencia = $configuracao->valor;
                    break;
                case 'frequencia':
                    $config_frequencia = $configuracao->valor;
                    break;
            }
        }

        $returnUsuarios = [] ;

        foreach($usuarios as $usuario){
            $PresencaController = new PresencaController();
            $presencas = $PresencaController->getPresencaPeriodo(
                $usuario->id,
                $post['grupo'],
                $post['disciplina'],
                $post['sala'],
                $post['dataInicial'],
                $post['dataFinal']
            );
            $ausencias = $PresencaController->getAusenciaPeriodo(
                $usuario->id,
                $post['grupo'],
                $post['disciplina'],
                $post['sala'],
                $post['dataInicial'],
                $post['dataFinal']
            );
            $justificado = $PresencaController->getJustificadoPeriodo(
                $usuario->id,
                $post['grupo'],
                $post['disciplina'],
                $post['sala'],
                $post['dataInicial'],
                $post['dataFinal']
            );

            $presencas = count($presencas);
            $ausencias = count($ausencias);
            $justificado = count($justificado);
            $total = $presencas + $justificado + $ausencias;
            $total = $total > 0 ? $total : 1;
            $frequencia = ( ($presencas + $justificado) / $total ) * 100;

            $aprovado = true;
            switch ($config_tipo_frequencia) {
                case 1:
                    if (!($frequencia >= $config_frequencia)){
                        $aprovado = false;
                    }
                    break;
                case 2:
                    if (!($presencas >= $config_frequencia)){
                        $aprovado = false;
                    }
                    break;
            }

            $returnUsuarios[] = [
                "id" => $usuario->id,
                "nome" => $usuario->nome,
                "presencas" => $presencas,
                "ausencias" => $ausencias,
                "justificado" => $justificado,
                "frequencia" => $frequencia,
                "aprovado" => $aprovado,
            ];
        }  

        return json_encode([
            "access" => true,
            "usuarios" => $returnUsuarios,
        ]); 
    }
}
?>