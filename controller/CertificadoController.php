<?php
include_once('PresencaController.php');
include_once('SalaController.php');
include_once('UtilsController.php');

class CertificadoController{
    public function certificadoTutore($post){
        if (isset($post['dataInicial'])
            && $post['dataInicial'] != ""
            && isset($post['dataFinal'])
            && $post['dataFinal'] != ""
            && isset($post['tutore'])
            && $post['tutore'] != ""
        ){
            $UtilsController = new UtilsController();
            $data1 = explode('-',$post['dataInicial']);
            $dataInicial = $data1[1];
            $mesInicial = $UtilsController->getMes($dataInicial);

            $data2 = explode('-',$post['dataFinal']);
            $dataFinal = $data2[1];
            $mesFinal = $UtilsController->getMes($dataFinal);
            $anoFinal = $data2[0];

            $SalaController = new SalaController();
            $salas = json_decode($SalaController->getSalas());
            $PresencaController = new PresencaController();
            $presencaAulas  = 0;
            foreach($salas as $sala){  
                $aulas = $PresencaController->getPresencaPeriodo(
                    $sala->id,
                    0,
                    0,
                    $post['tutore'],
                    $post['dataInicial'],
                    $post['dataFinal']
                );
                $presencaAulas  = count($aulas) + $presencaAulas;
            }

            $reuniao = $PresencaController->getPresencaPeriodo(
                0,
                0,
                0,
                $post['tutore'],
                $post['dataInicial'],
                $post['dataFinal']
            );
            $presencaReuniao = count($reuniao);

            return json_encode([
                "access" => true,
                "mesInicial" => $mesInicial,
                "mesFinal" => $mesFinal,
                "anoFinal" => $anoFinal,
                "presencaAulas" => $presencaAulas,
                "presencaReuniao" => $presencaReuniao,
            ]);
        } else {
            return json_encode([
                "access" => false,
                "message" => "Por favor, ensira todos os dados"
            ]);
        }
    }

    public function certificadoMonitore($post){
        if (isset($post['dataInicial'])
            && $post['dataInicial'] != ""
            && isset($post['dataFinal'])
            && $post['dataFinal'] != ""
            && isset($post['monitore'])
            && $post['monitore'] != ""
        ){
            $UtilsController = new UtilsController();
            $data1 = explode('-',$post['dataInicial']);
            $dataInicial = $data1[1];
            $mesInicial = $UtilsController->getMes($dataInicial);

            $data2 = explode('-',$post['dataFinal']);
            $dataFinal = $data2[1];
            $mesFinal = $UtilsController->getMes($dataFinal);
            $anoFinal = $data2[0];

            $SalaController = new SalaController();
            $salas = json_decode($SalaController->getSalas());
            $PresencaController = new PresencaController();
            $presencaMonitorias  = 0;
            foreach($salas as $sala){  
                $monitorias = $PresencaController->getPresencaPeriodo(
                    $sala->id,
                    0,
                    $post['monitore'],
                    0,
                    $post['dataInicial'],
                    $post['dataFinal']
                );
                $presencaMonitorias  = count($monitorias) + $presencaMonitorias;
            }

            return json_encode([
                "access" => true,
                "mesInicial" => $mesInicial,
                "mesFinal" => $mesFinal,
                "anoFinal" => $anoFinal,
                "presencaMonitorias" => $presencaMonitorias,
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