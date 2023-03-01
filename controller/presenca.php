<?php
    include_once('../model/presenca.php');
    include_once('monitore.php');
    include_once('tutore.php');

    class PresencaController{
        function buscarSalaAluneJustifica($post){
            $id = $post['sala'];
            header('Location: ../alune_justificar_presenca.php?sala='.$id);
        }

        function buscarPresencaAlune($post){
            $presenca = new Presenca();
            $presenca->cod_alune = $post['alune'];
            $presenca->cod_sala = $post['sala'];
            $presenca->aula = $post['aula'];
            $presenca->data = $post['data'];
            $presente = $presenca->verificarPresenca();
            header('Location: ../alune_justificar_presenca.php?sala='.$post['sala'].'&alune='.$post['alune'].'&data='.$post['data'].'&aula='.$post['aula'].'&presente='.$presente[0]['presente']);
        }

        function justificarPresencaAlune($post){
            $presenca = new Presenca();
            $presenca->cod_alune = $post['alune'];
            $presenca->cod_sala = $post['sala'];
            $presenca->aula = $post['aula'];
            $presenca->data =  $post['data'];
            $presenca->presente =  $post['presente'];
            $presenca->justificarPresenca();
            header('Location: ../alune_justificar_presenca.php');
        }

        function buscarPresencaReuniao($post){
            $presenca = new Presenca();
            $presenca->cod_tutore = $post['tutore'];
            $presenca->data = $post['data'];
            $presente = $presenca->verificarPresenca();
            header('Location: ../tutore_justificar_presenca.php?tutore='.$post['tutore'].'&data='.$post['data'].'&presente='.$presente[0]['presente']);
        }

        function justificarPresencaReuniao($post){
            $presenca = new Presenca();
            $presenca->cod_tutore = $post['tutore'];
            $presenca->data =  $post['data'];
            $presenca->presente =  $post['presente'];
            $presenca->justificarPresenca();
            header('Location: ../tutore_justificar_presenca.php?sucess=true');
        }

        function buscarPresencaMonitore($post){
            $presenca = new Presenca();
            $presenca->cod_monitore = $post['monitore'];
            $presenca->cod_sala = $post['sala'];
            $presenca->data = $post['data'];
            $presente = $presenca->verificarPresenca();
            header('Location: ../monitore/monitore_editar_presenca.php?monitore='.$post['monitore'].'&sala='.$post['sala'].'&data='.$post['data'].'&presente='.$presente[0]['presente']);
        }

        function editarPresencaMonitore($post){
            $presenca = new Presenca();
            $presenca->cod_monitore = $post['monitore'];
            $presenca->cod_sala = $post['sala'];
            $presenca->data =  $post['data'];
            $presenca->presente =  $post['presente'];
            $presenca->justificarPresenca();
            header('Location: ../monitore_editar_presenca.php?sucess=true');
        }

        function buscarPresencaTutore($post){
            $presenca = new Presenca();
            $presenca->cod_tutore = $post['tutore'];
            $presenca->cod_sala = $post['sala'];
            $presenca->aula = $post['aula'];
            $presenca->data = $post['data'];
            $presente = $presenca->verificarPresenca();
            header('Location: ../tutore_editar_presenca.php?tutore='.$post['tutore'].'&sala='.$post['sala'].'&aula='.$post['aula'].'&data='.$post['data'].'&presente='.$presente[0]['presente']);
        }

        function editarPresencaTutore($post){
            $presenca = new Presenca();
            $presenca->cod_tutore = $post['tutore'];
            $presenca->cod_sala = $post['sala'];
            $presenca->data =  $post['data'];
            $presenca->aula = $post['aula'];
            $presenca->presente =  $post['presente'];
            $presenca->justificarPresenca();
            header('Location: ../tutore_editar_presenca.php?sucess=true');
        }

        function buscarSalaAlune($post){
            $id = $post['sala'];
            header('Location: ../presenca_cadastro_alune.php?sala='.$id);
        }

        function criarPresencaAlune($post){
            $AluneController = new AluneController();
            $alunes = $AluneController->getAlunesSala($post['sala']);
            $presente = isset($post['presente']) ? $post['presente'] : [] ;
            $erroAlune = 0;
            foreach($alunes as $alune){
                if(in_array($alune['id'], $presente)){
                    $presenca = new Presenca();
                    $presenca->cod_alune = $alune['id'];
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
                    $presenca->cod_alune = $alune['id'];
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
                header('Location: ../presenca_cadastro_alune.php?sucess=false');
            }else{
                header('Location: ../presenca_cadastro_alune.php?sucess=true');
            }
        }

        function criarPresencaTutore($post){
            $presenca = new Presenca();
            $presenca->cod_tutore = $post['tutore'];
            $presenca->cod_sala = $post['sala'];
            $presenca->aula = $post['aula'];
            $presenca->presente = 'S';
            $presenca->data = $post['data'];
            $verificarPresenca = $presenca->verificarPresencaTutore();
            if(count($verificarPresenca) > 0){
                header('Location: ../presenca_cadastro_tutore.php?sucess=false');
            }else{
                $presenca->criarPresenca();
                header('Location: ../presenca_cadastro_tutore.php?sucess=true');
            }
        }

        function criarPresencaMonitore($post){
            $presenca = new Presenca();
            $presenca->cod_monitore = $post['monitore'];
            $presenca->cod_sala = $post['sala'];
            $presenca->presente = 'S';
            $presenca->data = $post['data'];
            $verificarPresenca = $presenca->verificarPresencaMonitore();
            if(count($verificarPresenca) > 0){
                header('Location: ../presenca_cadastro_monitore.php?sucess=false');
            }else{
                $presenca->criarPresenca();
                header('Location: ../presenca_cadastro_monitore.php?sucess=true');
            }
        }

        function criarPresencaReuniao($post){
            $TutoreController = new TutoreController();
            $tutores = $TutoreController->getTutores();
            $presente = isset($post['presente']) ? $post['presente'] : [] ;
            $erroTutore = 0;
            foreach($tutores as $tutore){
                if(in_array($tutore['id'], $presente)){
                    $presenca = new Presenca();
                    $presenca->cod_tutore = $tutore['id'];
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
                    $presenca->cod_tutore = $tutore['id'];
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
                header('Location: ../presenca_cadastro_reuniao.php?sucess=false');
            }else{
                header('Location: ../presenca_cadastro_reuniao.php?sucess=true');
            }
        }

        function relatorioPresencaAlune($post){
            $cod_sala = $post['cod_sala'];
            $data_inicial = $post['data_inicial'];
            $data_final = $post['data_final'];
            header('Location: ../relatorio_alune.php?cod_sala='.$cod_sala.'&data_inicial='.$data_inicial.'&data_final='.$data_final);
        }

        function relatorioPresencaReuniao($post){
            $data_inicial = $post['data_inicial'];
            $data_final = $post['data_final'];
            header('Location: ../relatorio_reuniao.php?data_inicial='.$data_inicial.'&data_final='.$data_final);
        }

        function relatorioPresencaMonitore($post){
            $cod_sala = $post['cod_sala'];
            $data_inicial = $post['data_inicial'];
            $data_final = $post['data_final'];
            header('Location: ../relatorio_monitore.php?cod_sala='.$cod_sala.'&data_inicial='.$data_inicial.'&data_final='.$data_final);
        }
        
        function relatorioPresencaTutore($post){
            $cod_sala = $post['cod_sala'];
            $data_inicial = $post['data_inicial'];
            $data_final = $post['data_final'];
            header('Location: ../relatorio_tutore.php?cod_sala='.$cod_sala.'&data_inicial='.$data_inicial.'&data_final='.$data_final);
        }
        
        function getPresenca(){
            $presenca = new Presenca();
            return $presenca->getPresenca();
        }

        function getPresencaMonitore($cod_monitore, $data_inicial, $data_final){
            $presenca = new Presenca();
            $presenca->cod_monitore = $cod_monitore;
            $presenca->data = $data_inicial;
            $presenca->data_final = $data_final;
            return $presenca->getPresencaMonitore();
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

        function deletaPresencaAlune($cod_alune){
            $presenca = new Presenca();
            $presenca->cod_alune = $cod_alune;
            return $presenca->deletaPresencaAlune();
        }

    }
?>