<?php
    include_once('../model/Presenca.php');

    class PresencaController{

        function buscarPresencaAlune($post){
            if (isset($post['alune'])
                && $post['alune'] != ""
                && isset($post['sala'])
                && $post['sala'] != ""
                && isset($post['data'])
                && $post['data'] != ""
                && isset($post['aula'])
                && $post['aula'] != ""
            ){
                $presenca = new Presenca();
                $presenca->cod_alune = $post['alune'];
                $presenca->cod_sala = $post['sala'];
                $presenca->data = $post['data'];
                $presenca->aula = $post['aula'];
                $presente = $presenca->verificarPresenca();
                if (!empty($presente)) {
                    return json_encode([
                        "access" => true,
                        "presente" => $presente[0]["presente"],
                    ]);
                } else {
                    return json_encode([
                        "access" => false,
                        "message" => "Presença não encontrada"
                    ]);
                }
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function criarPresencaAlune($post){
            if (isset($post['sala'])
                && $post['sala'] != ""
                && isset($post['aula'])
                && $post['aula'] != ""
                && isset($post['data'])
                && $post['data'] != ""
            ){
                $AluneController = new AluneController();
                $getAlunesSala = json_decode($AluneController->getAlunesSala(["sala" => $post['sala']]));
                $alunes = $getAlunesSala->alunes;
                $presente = isset($post['presente']) ? $post['presente'] : [] ;
                $erroAlune = 0;
                foreach($alunes as $alune){
                    if(in_array($alune->id, $presente)){
                        $presenca = new Presenca();
                        $presenca->cod_alune = $alune->id;
                        $presenca->cod_sala = $post['sala'];
                        $presenca->aula = $post['aula'];
                        $presenca->presente = 'S';
                        $presenca->data = $post['data'];
                        $verificarPresenca = $presenca->verificarPresenca();
                        if(count($verificarPresenca) > 0){
                            $erroAlune++;
                        }else{
                            $presenca->criarPresenca(); 
                        }
                    }else{
                        $presenca = new Presenca();
                        $presenca->cod_alune = $alune->id;
                        $presenca->cod_sala = $post['sala'];
                        $presenca->aula = $post['aula'];
                        $presenca->presente = 'N';
                        $presenca->data = $post['data'];
                        $verificarPresenca = $presenca->verificarPresenca();
                        if(count($verificarPresenca) > 0){
                            $erroAlune++;
                        }else{
                            $presenca->criarPresenca(); 
                        }
                    }
                }
                if($erroAlune > 0){
                    return json_encode([
                        "access" => false,
                        "message" => "Presença já contabilizada"
                    ]);
                }else{
                    return json_encode([
                        "access" => true,
                        "message" => "Presença contabilizada com sucesso"
                    ]);
                }
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function justificarPresencaAlune($post){
            if (isset($post['alune'])
                && $post['alune'] != ""
                && isset($post['sala'])
                && $post['sala'] != ""
                && isset($post['aula'])
                && $post['aula'] != ""
                && isset($post['data'])
                && $post['data'] != ""
                && isset($post['presente'])
                && $post['presente'] != ""
            ){
                $presenca = new Presenca();
                $presenca->cod_alune = $post['alune'];
                $presenca->cod_sala = $post['sala'];
                $presenca->aula = $post['aula'];
                $presenca->data =  $post['data'];
                $presenca->presente =  $post['presente'];
                $presenca->justificarPresenca();
                return json_encode([
                    "access" => true,
                    "message" => "Presença justificada com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function deletaPresencaAlune($cod_alune){
            $presenca = new Presenca();
            $presenca->cod_alune = $cod_alune;
            return $presenca->deletaPresencaAlune();
        }

        function buscarPresencaReuniao($post){
            if (isset($post['tutore'])
                && $post['tutore'] != ""
                && isset($post['data'])
                && $post['data'] != ""
            ){
                $presenca = new Presenca();
                $presenca->cod_tutore = $post['tutore'];
                $presenca->data = $post['data'];
                $presente = $presenca->verificarPresenca();
                if (!empty($presente)) {
                    return json_encode([
                        "access" => true,
                        "presente" => $presente[0]["presente"],
                    ]);
                } else {
                    return json_encode([
                        "access" => false,
                        "message" => "Presença não encontrada"
                    ]);
                }
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function criarPresencaReuniao($post){
            if (isset($post['data'])
                && $post['data'] != ""
            ){
                $TutoreController = new TutoreController();
                $tutores = json_decode($TutoreController->getTutores());
                $presente = isset($post['presente']) ? $post['presente'] : [] ;
                $erroTutore = 0;
                foreach($tutores as $tutore){
                    if(in_array($tutore->id, $presente)){
                        $presenca = new Presenca();
                        $presenca->cod_tutore = $tutore->id;
                        $presenca->presente = 'S';
                        $presenca->data = $post['data'];
                        $verificarPresenca = $presenca->verificarPresenca();
                        if(count($verificarPresenca) > 0){
                            $erroTutore++;
                        }else{
                            $presenca->criarPresenca(); 
                        }
                    }else{
                        $presenca = new Presenca();
                        $presenca->cod_tutore = $tutore->id;
                        $presenca->presente = 'N';
                        $presenca->data = $post['data'];
                        $verificarPresenca = $presenca->verificarPresenca();
                        if(count($verificarPresenca) > 0){
                            $erroTutore++;
                        }else{
                            $presenca->criarPresenca(); 
                        }
                    }
                }
                if($erroTutore > 0){
                    return json_encode([
                        "access" => false,
                        "message" => "Presença já contabilizada"
                    ]);
                }else{
                    return json_encode([
                        "access" => true,
                        "message" => "Presença contabilizada com sucesso"
                    ]);
                }
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function justificarPresencaReuniao($post){
            if (isset($post['tutore'])
                && $post['tutore'] != ""
                && isset($post['data'])
                && $post['data'] != ""
            ){
                $presenca = new Presenca();
                $presenca->cod_tutore = $post['tutore'];
                $presenca->data =  $post['data'];
                $presenca->presente =  $post['presente'];
                $presenca->justificarPresenca();
                return json_encode([
                    "access" => true,
                    "message" => "Presença justificada com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function buscarPresencaMonitore($post){
            if (isset($post['monitore'])
                && $post['monitore'] != ""
                && isset($post['sala'])
                && $post['sala'] != ""
                && isset($post['data'])
                && $post['data'] != ""
            ){
                $presenca = new Presenca();
                $presenca->cod_monitore = $post['monitore'];
                $presenca->cod_sala = $post['sala'];
                $presenca->data = $post['data'];
                $presente = $presenca->verificarPresenca();
                if (!empty($presente)) {
                    return json_encode([
                        "access" => true,
                        "presente" => $presente[0]["presente"],
                    ]);
                } else {
                    return json_encode([
                        "access" => false,
                        "message" => "Presença não encontrada"
                    ]);
                }
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function criarPresencaMonitore($post){      
            if (isset($post['monitore'])
                && $post['monitore'] != ""
                && isset($post['sala'])
                && $post['sala'] != ""
                && isset($post['data'])
                && $post['data'] != ""
            ){
                $presenca = new Presenca();
                $presenca->cod_monitore = $post['monitore'];
                $presenca->cod_sala = $post['sala'];
                $presenca->presente = 'S';
                $presenca->data = $post['data'];
                $verificarPresenca = $presenca->verificarPresenca();
                if(count($verificarPresenca) > 0){
                    return json_encode([
                        "access" => false,
                        "message" => "Presença já contabilizada"
                    ]);
                }else{
                    $presenca->criarPresenca();
                    return json_encode([
                        "access" => true,
                        "message" => "Presença contabilizada com sucesso"
                    ]);

                }
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function editarPresencaMonitore($post){
            if (isset($post['monitore'])
                && $post['monitore'] != ""
                && isset($post['sala'])
                && $post['sala'] != ""
                && isset($post['data'])
                && $post['data'] != ""
                && isset($post['presente'])
                && $post['presente'] != ""
            ){
                $presenca = new Presenca();
                $presenca->cod_monitore = $post['monitore'];
                $presenca->cod_sala = $post['sala'];
                $presenca->data =  $post['data'];
                $presenca->presente =  $post['presente'];
                $presenca->justificarPresenca();
                return json_encode([
                    "access" => true,
                    "message" => "Presença editada com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function buscarPresencaTutore($post){
            if (isset($post['tutore'])
                && $post['tutore'] != ""
                && isset($post['sala'])
                && $post['sala'] != ""
                && isset($post['aula'])
                && $post['aula'] != ""
                && isset($post['data'])
                && $post['data'] != ""
            ){
                $presenca = new Presenca();
                $presenca->cod_tutore = $post['tutore'];
                $presenca->cod_sala = $post['sala'];
                $presenca->aula = $post['aula'];
                $presenca->data = $post['data'];
                $presente = $presenca->verificarPresenca();
                if (!empty($presente)) {
                    return json_encode([
                        "access" => true,
                        "presente" => $presente[0]["presente"],
                    ]);
                } else {
                    return json_encode([
                        "access" => false,
                        "message" => "Presença não encontrada"
                    ]);
                }
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function editarPresencaTutore($post){
            if (isset($post['tutore'])
                && $post['tutore'] != ""
                && isset($post['sala'])
                && $post['sala'] != ""
                && isset($post['aula'])
                && $post['aula'] != ""
                && isset($post['data'])
                && $post['data'] != ""
                && isset($post['presente'])
                && $post['presente'] != ""
            ){
                $presenca = new Presenca();
                $presenca->cod_tutore = $post['tutore'];
                $presenca->cod_sala = $post['sala'];
                $presenca->aula = $post['aula'];
                $presenca->data =  $post['data'];
                $presenca->presente =  $post['presente'];
                $presenca->justificarPresenca();
                return json_encode([
                    "access" => true,
                    "message" => "Presença editada com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function criarPresencaTutore($post){
            if (isset($post['tutore'])
                && $post['tutore'] != ""
                && isset($post['sala'])
                && $post['sala'] != ""
                && isset($post['data'])
                && $post['data'] != ""
                && isset($post['aula'])
                && $post['aula'] != ""
            ){
                $presenca = new Presenca();
                $presenca->cod_tutore = $post['tutore'];
                $presenca->cod_sala = $post['sala'];
                $presenca->presente = 'S';
                $presenca->data = $post['data'];
                $presenca->aula = $post['aula'];
                $verificarPresenca = $presenca->verificarPresenca();
                if(count($verificarPresenca) > 0){
                    return json_encode([
                        "access" => false,
                        "message" => "Presença já contabilizada"
                    ]);
                }else{
                    $presenca->criarPresenca();
                    return json_encode([
                        "access" => true,
                        "message" => "Presença contabilizada com sucesso"
                    ]);

                }
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Por favor, ensira todos os dados"
                ]);
            }
        }

        function getPresencaPeriodo($cod_sala, $cod_alune, $cod_monitore, $cod_tutore, $data_inicial, $data_final){
            $presenca = new Presenca();
            $presenca->cod_sala = $cod_sala ;
            $presenca->cod_monitore = $cod_monitore ;
            $presenca->cod_tutore = $cod_tutore ;
            $presenca->cod_alune = $cod_alune ;
            $presenca->data = $data_inicial ;
            $presenca->data_final = $data_final ;
            return $presenca->getPresencaPeriodo();
        }

        function getAusenciaPeriodo($cod_sala, $cod_alune, $cod_monitore, $cod_tutore, $data_inicial, $data_final){
            $presenca = new Presenca();
            $presenca->cod_sala = $cod_sala ;
            $presenca->cod_monitore = $cod_monitore ;
            $presenca->cod_tutore = $cod_tutore ;
            $presenca->cod_alune = $cod_alune ;
            $presenca->data = $data_inicial ;
            $presenca->data_final = $data_final ;
            return $presenca->getAusenciaPeriodo();
        }

        function getJustificadoPeriodo($cod_sala, $cod_alune, $cod_monitore, $cod_tutore, $data_inicial, $data_final){
            $presenca = new Presenca();
            $presenca->cod_sala = $cod_sala ;
            $presenca->cod_monitore = $cod_monitore ;
            $presenca->cod_tutore = $cod_tutore ;
            $presenca->cod_alune = $cod_alune ;
            $presenca->data = $data_inicial ;
            $presenca->data_final = $data_final ;
            return $presenca->getJustificadoPeriodo();
        }

        function certificadoTutore($post){
            $cod_tutore = $post['cod_tutore'];
            $data_inicial = $post['data_inicial'];
            $data_final = $post['data_final'];
            $cod_docente = $post['cod_docente'];
            $cod_discente = $post['cod_discente'];
            header('Location: ../certificado/frente.php?cod_tutore='.$cod_tutore.'&data_inicial='.$data_inicial.'&data_final='.$data_final.'&cod_docente='.$cod_docente.'&cod_discente='.$cod_discente);
        }
    }
?>