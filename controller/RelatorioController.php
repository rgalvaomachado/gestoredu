<?php
include_once('PresencaController.php');
include_once('UsuarioController.php');

class RelatorioController{
    function relatorioChamada($post){
        $UsuarioController = new UsuarioController();
        $buscarTodos = json_decode($UsuarioController->buscarTodos([
            "grupo" => $post['grupo'],
            "sala" => $post['sala'],
            "disciplina" => $post['disciplina']
        ]));
        $usuarios = $buscarTodos->usuarios;
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

            $returnUsuarios[] = [
                "id" => $usuario->id,
                "nome" => $usuario->nome,
                "presencas" => $presencas,
                "ausencias" => $ausencias,
                "justificado" => $justificado,
                "frequencia" => $frequencia,
            ];
        }  

        return json_encode([
            "access" => true,
            "usuarios" => $returnUsuarios,
        ]); 
    }

    // function relatorioPonto($post){
    //     if (isset($post['sala'])
    //         && $post['sala'] != ""
    //         && isset($post['dataInicial'])
    //         && $post['dataInicial'] != ""
    //         && isset($post['dataFinal'])
    //         && $post['dataFinal'] != ""
    //     ){
    //         $MonitoreController = new MonitoreController;
    //         $MonitoresInfos = json_decode($MonitoreController->getMonitores());
    //         foreach($MonitoresInfos as $monitore){
    //             $PresencaController = new PresencaController();
    //             $presencas = $PresencaController->getPresencaPeriodo(
    //                 $post['sala'],
    //                 0,
    //                 $monitore->id,	
    //                 0,
    //                 $post['dataInicial'],
    //                 $post['dataFinal']
    //             );
    //             $ausencias = $PresencaController->getAusenciaPeriodo(
    //                 $post['sala'],
    //                 0,
    //                 $monitore->id,	
    //                 0,
    //                 $post['dataInicial'],
    //                 $post['dataFinal']
    //             );
    //             $justificado = $PresencaController->getJustificadoPeriodo(
    //                 $post['sala'],
    //                 0,
    //                 $monitore->id,	
    //                 0,
    //                 $post['dataInicial'],
    //                 $post['dataFinal']
    //             );

    //             $presencas = count($presencas);
    //             $ausencias = count($ausencias);
    //             $justificado = count($justificado);
    //             $total = $presencas + $justificado + $ausencias;
    //             $total = $total > 0 ? $total : 1;
    //             $frequencia = ( ($presencas + $justificado) / $total ) * 100;

    //             $monitores[] = [
    //                 "id" => $monitore->id,
    //                 "nome" => $monitore->nome,
    //                 "presencas" => $presencas,
    //                 "ausencias" => $ausencias,
    //                 "justificado" => $justificado,
    //                 "frequencia" => $frequencia,
    //             ];
    //         }  
    //         return json_encode([
    //             "access" => true,
    //             "monitores" => $monitores,
    //         ]);   
    //     } else {
    //         return json_encode([
    //             "access" => false,
    //             "message" => "Por favor, ensira todos os dados"
    //         ]);
    //     }
    // }
}
?>