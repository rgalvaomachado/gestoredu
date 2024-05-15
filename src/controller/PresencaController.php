<?php
    include_once('src/model/Presenca.php');
    include_once('src/controller/UsuarioController.php');

    class PresencaController{
        function criarPresencaListada($post){
            $UsuarioController = new UsuarioController();
            $buscarTodos = json_decode($UsuarioController->buscarTodos([
                "grupo" => $post['grupo'],
                "sala" => $post['sala'],
                "disciplina" => $post['disciplina']
            ]));
            $usuarios = $buscarTodos->usuarios;
            $presente = isset($post['presente']) ? $post['presente'] : [] ;
            $erroAlune = 0;
            foreach($usuarios as $usuario){
                if(in_array($usuario->id, $presente)){
                    $presenca = new Presenca();
                    $presenca->cod_usuario = $usuario->id;
                    $presenca->cod_grupo = $post['grupo'];
                    $presenca->cod_disciplina = $post['disciplina'];
                    $presenca->cod_sala = $post['sala'];
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
                    $presenca->cod_usuario = $usuario->id;
                    $presenca->cod_grupo = $post['grupo'];
                    $presenca->cod_disciplina = $post['disciplina'];
                    $presenca->cod_sala = $post['sala'];
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
        }

        function criarPresencaInvidual($post){
            $erroAlune = 0;
            $presenca = new Presenca();
            $presenca->cod_usuario = $post['usuario'];
            $presenca->cod_grupo = $post['grupo'];
            $presenca->cod_disciplina = $post['disciplina'];
            $presenca->cod_sala = $post['sala'];
            $presenca->presente = $post['presente'];
            $presenca->data = $post['data'];
            $verificarPresenca = $presenca->verificarPresenca();
            if(count($verificarPresenca) > 0){
                $erroAlune++;
            }else{
                $presenca->criarPresenca(); 
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
        }

        // function justificarPresencaAlune($post){
        //     if (isset($post['alune'])
        //         && $post['alune'] != ""
        //         && isset($post['sala'])
        //         && $post['sala'] != ""
        //         && isset($post['aula'])
        //         && $post['aula'] != ""
        //         && isset($post['data'])
        //         && $post['data'] != ""
        //         && isset($post['presente'])
        //         && $post['presente'] != ""
        //     ){
        //         $presenca = new Presenca();
        //         $presenca->cod_alune = $post['alune'];
        //         $presenca->cod_sala = $post['sala'];
        //         $presenca->aula = $post['aula'];
        //         $presenca->data =  $post['data'];
        //         $presenca->presente =  $post['presente'];
        //         $presenca->justificarPresenca();
        //         return json_encode([
        //             "access" => true,
        //             "message" => "Presença justificada com sucesso"
        //         ]);
        //     } else {
        //         return json_encode([
        //             "access" => false,
        //             "message" => "Por favor, ensira todos os dados"
        //         ]);
        //     }
        // }

        // function deletaPresencaAlune($cod_alune){
        //     $presenca = new Presenca();
        //     $presenca->cod_alune = $cod_alune;
        //     return $presenca->deletaPresencaAlune();
        // }

        // function editarPresencaMonitore($post){
        //     if (isset($post['monitore'])
        //         && $post['monitore'] != ""
        //         && isset($post['sala'])
        //         && $post['sala'] != ""
        //         && isset($post['data'])
        //         && $post['data'] != ""
        //         && isset($post['presente'])
        //         && $post['presente'] != ""
        //     ){
        //         $presenca = new Presenca();
        //         $presenca->cod_monitore = $post['monitore'];
        //         $presenca->cod_sala = $post['sala'];
        //         $presenca->data =  $post['data'];
        //         $presenca->presente =  $post['presente'];
        //         $presenca->justificarPresenca();
        //         return json_encode([
        //             "access" => true,
        //             "message" => "Presença editada com sucesso"
        //         ]);
        //     } else {
        //         return json_encode([
        //             "access" => false,
        //             "message" => "Por favor, ensira todos os dados"
        //         ]);
        //     }
        // }

        function getPresencaPeriodo($cod_usuario, $cod_grupo, $cod_disciplina, $cod_sala, $data_inicial, $data_final){
            $presenca = new Presenca();
            $presenca->cod_usuario = $cod_usuario;
            $presenca->cod_grupo = $cod_grupo;
            $presenca->cod_disciplina = $cod_disciplina;
            $presenca->cod_sala = $cod_sala;
            $presenca->data = $data_inicial;
            $presenca->data_final = $data_final;
            return $presenca->getPresencaPeriodo();
        }

        function getAusenciaPeriodo($cod_usuario, $cod_grupo, $cod_disciplina, $cod_sala, $data_inicial, $data_final){
            $presenca = new Presenca();
            $presenca->cod_usuario = $cod_usuario;
            $presenca->cod_grupo = $cod_grupo;
            $presenca->cod_disciplina = $cod_disciplina;
            $presenca->cod_sala = $cod_sala;
            $presenca->data = $data_inicial;
            $presenca->data_final = $data_final;
            return $presenca->getAusenciaPeriodo();
        }

        function getJustificadoPeriodo($cod_usuario, $cod_grupo, $cod_disciplina, $cod_sala, $data_inicial, $data_final){
            $presenca = new Presenca();
            $presenca->cod_usuario = $cod_usuario;
            $presenca->cod_grupo = $cod_grupo;
            $presenca->cod_disciplina = $cod_disciplina;
            $presenca->cod_sala = $cod_sala;
            $presenca->data = $data_inicial;
            $presenca->data_final = $data_final;
            return $presenca->getJustificadoPeriodo();
        }

        // function certificadoTutore($post){
        //     $cod_tutore = $post['cod_tutore'];
        //     $data_inicial = $post['data_inicial'];
        //     $data_final = $post['data_final'];
        //     $cod_docente = $post['cod_docente'];
        //     $cod_discente = $post['cod_discente'];
        //     header('Location: ../certificado/frente.php?cod_tutore='.$cod_tutore.'&data_inicial='.$data_inicial.'&data_final='.$data_final.'&cod_docente='.$cod_docente.'&cod_discente='.$cod_discente);
        // }
    }
?>