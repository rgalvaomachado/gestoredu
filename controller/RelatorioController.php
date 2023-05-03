<?php
include_once('PresencaController.php');

class RelatorioController{
    function relatorioPresencaAlune($post){
        if (isset($post['sala'])
            && $post['sala'] != ""
            && isset($post['dataInicial'])
            && $post['dataInicial'] != ""
            && isset($post['dataFinal'])
            && $post['dataFinal'] != ""
        ){
            $AluneController = new AluneController;
            $AlunesInfos = json_decode($AluneController->getAlunesSala(["sala" => $post['sala']]));
            $alunes = [];
            foreach($AlunesInfos->alunes as $alune){
                $PresencaController = new PresencaController();
                $presencas = $PresencaController->getPresencaPeriodo(
                    $post['sala'],
                    $alune->id,
                    0,
                    0,
                    $post['dataInicial'],
                    $post['dataFinal']
                );
                $ausencias = $PresencaController->getAusenciaPeriodo(
                    $post['sala'],
                    $alune->id,
                    0,
                    0,
                    $post['dataInicial'],
                    $post['dataFinal']
                );
                $justificado = $PresencaController->getJustificadoPeriodo(
                    $post['sala'],
                    $alune->id,
                    0,
                    0,
                    $post['dataInicial'],
                    $post['dataFinal']
                );

                $presencas = count($presencas);
                $ausencias = count($ausencias);
                $justificado = count($justificado);
                $total = $presencas + $justificado + $ausencias;
                $total = $total > 0 ? $total : 1;
                $frequencia = ( ($presencas + $justificado) / $total ) * 100;

                $alunes[] = [
                    "id" => $alune->id,
                    "nome" => $alune->nome,
                    "presencas" => $presencas,
                    "ausencias" => $ausencias,
                    "justificado" => $justificado,
                    "frequencia" => $frequencia,
                ];
            }  
            return json_encode([
                "access" => true,
                "alunes" => $alunes,
            ]);   
        } else {
            return json_encode([
                "access" => false,
                "message" => "Por favor, ensira todos os dados"
            ]);
        }
    }

    function relatorioPresencaReuniao($post){
        if (isset($post['dataInicial'])
            && $post['dataInicial'] != ""
            && isset($post['dataFinal'])
            && $post['dataFinal'] != ""
        ){
            $TutoreController = new TutoreController;
            $TutoresInfos = json_decode($TutoreController->getTutores());
            foreach($TutoresInfos as $tutore){
                $PresencaController = new PresencaController();
                $presencas = $PresencaController->getPresencaPeriodo(
                    0,
                    0,
                    0,
                    $tutore->id,
                    $post['dataInicial'],
                    $post['dataFinal']
                );
                $ausencias = $PresencaController->getAusenciaPeriodo(
                    0,
                    0,
                    0,
                    $tutore->id,
                    $post['dataInicial'],
                    $post['dataFinal']
                );
                $justificado = $PresencaController->getJustificadoPeriodo(
                    0,
                    0,
                    0,
                    $tutore->id,
                    $post['dataInicial'],
                    $post['dataFinal']
                );

                $presencas = count($presencas);
                $ausencias = count($ausencias);
                $justificado = count($justificado);
                $total = $presencas + $justificado + $ausencias;
                $total = $total > 0 ? $total : 1;
                $frequencia = ( ($presencas + $justificado) / $total ) * 100;

                $tutores[] = [
                    "id" => $tutore->id,
                    "nome" => $tutore->nome,
                    "presencas" => $presencas,
                    "ausencias" => $ausencias,
                    "justificado" => $justificado,
                    "frequencia" => $frequencia,
                ];
            }  
            return json_encode([
                "access" => true,
                "tutores" => $tutores,
            ]);   
        } else {
            return json_encode([
                "access" => false,
                "message" => "Por favor, ensira todos os dados"
            ]);
        }
    }

    function relatorioPresencaMonitore($post){
        if (isset($post['sala'])
            && $post['sala'] != ""
            && isset($post['dataInicial'])
            && $post['dataInicial'] != ""
            && isset($post['dataFinal'])
            && $post['dataFinal'] != ""
        ){
            $MonitoreController = new MonitoreController;
            $MonitoresInfos = json_decode($MonitoreController->getMonitores());
            foreach($MonitoresInfos as $monitore){
                $PresencaController = new PresencaController();
                $presencas = $PresencaController->getPresencaPeriodo(
                    $post['sala'],
                    0,
                    $monitore->id,	
                    0,
                    $post['dataInicial'],
                    $post['dataFinal']
                );
                $ausencias = $PresencaController->getAusenciaPeriodo(
                    $post['sala'],
                    0,
                    $monitore->id,	
                    0,
                    $post['dataInicial'],
                    $post['dataFinal']
                );
                $justificado = $PresencaController->getJustificadoPeriodo(
                    $post['sala'],
                    0,
                    $monitore->id,	
                    0,
                    $post['dataInicial'],
                    $post['dataFinal']
                );

                $presencas = count($presencas);
                $ausencias = count($ausencias);
                $justificado = count($justificado);
                $total = $presencas + $justificado + $ausencias;
                $total = $total > 0 ? $total : 1;
                $frequencia = ( ($presencas + $justificado) / $total ) * 100;

                $monitores[] = [
                    "id" => $monitore->id,
                    "nome" => $monitore->nome,
                    "presencas" => $presencas,
                    "ausencias" => $ausencias,
                    "justificado" => $justificado,
                    "frequencia" => $frequencia,
                ];
            }  
            return json_encode([
                "access" => true,
                "monitores" => $monitores,
            ]);   
        } else {
            return json_encode([
                "access" => false,
                "message" => "Por favor, ensira todos os dados"
            ]);
        }
    }

    function relatorioPresencaTutore($post){
        if (isset($post['sala'])
            && $post['sala'] != ""
            && isset($post['dataInicial'])
            && $post['dataInicial'] != ""
            && isset($post['dataFinal'])
            && $post['dataFinal'] != ""
        ){
            $TutoreController = new TutoreController;
            $TutoresInfos = json_decode($TutoreController->getTutores());
            foreach($TutoresInfos as $tutore){
                $PresencaController = new PresencaController();
                $presencas = $PresencaController->getPresencaPeriodo(
                    $post['sala'],
                    0,
                    0,
                    $tutore->id,
                    $post['dataInicial'],
                    $post['dataFinal']
                );
                $ausencias = $PresencaController->getAusenciaPeriodo(
                    $post['sala'],
                    0,
                    0,
                    $tutore->id,
                    $post['dataInicial'],
                    $post['dataFinal']
                );
                $justificado = $PresencaController->getJustificadoPeriodo(
                    $post['sala'],
                    0,
                    0,
                    $tutore->id,
                    $post['dataInicial'],
                    $post['dataFinal']
                );

                $presencas = count($presencas);
                $ausencias = count($ausencias);
                $justificado = count($justificado);
                $total = $presencas + $justificado + $ausencias;
                $total = $total > 0 ? $total : 1;
                $frequencia = ( ($presencas + $justificado) / $total ) * 100;

                $tutores[] = [
                    "id" => $tutore->id,
                    "nome" => $tutore->nome,
                    "presencas" => $presencas,
                    "ausencias" => $ausencias,
                    "justificado" => $justificado,
                    "frequencia" => $frequencia,
                ];
            }  
            return json_encode([
                "access" => true,
                "tutores" => $tutores,
            ]);   
        } else {
            return json_encode([
                "access" => false,
                "message" => "Por favor, ensira todos os dados"
            ]);
        }
    }
}
?>