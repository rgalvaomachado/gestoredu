<?php
    class PresencaController extends Controller{
        function criarPresencaListada($post){
            $MatriculaController = new MatriculaController();
            $buscarTodos = json_decode($MatriculaController->buscarTodos([
                "grupo" => $post['grupo'],
                "sala" => $post['sala'],
                "disciplina" => $post['disciplina']
            ]));
            $usuarios = $buscarTodos->matriculas;
            $presente = isset($post['presente[]']) ? $post['presente[]'] : [] ;
            $erroAlune = 0;
            foreach($usuarios as $usuario){
                $presenca = new Presenca();
                $presenca->cod_usuario = $usuario->id;
                $presenca->cod_grupo = $post['grupo'];
                $presenca->cod_disciplina = $post['disciplina'];
                $presenca->cod_sala = $post['sala'];
                $presenca->data = $post['data'];

                if(in_array($usuario->id, $presente)){
                    $presenca->presente = 'S';
                }else{
                    $presenca->presente = 'N';
                }

                $ConfiguracaoController = new ConfiguracaoController();
                $multi_chamada = json_decode($ConfiguracaoController->buscar(['chave' => 'multi_chamada']));
                
                $verificarPresenca = $presenca->verificarPresenca();
                
                if (count($verificarPresenca) > 0 && !$multi_chamada->configuracao->valor) {
                    $erroAlune++;
                } else {
                    $presenca->criarPresenca(); 
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

            $ConfiguracaoController = new ConfiguracaoController();
            $multi_chamada = json_decode($ConfiguracaoController->buscar(['chave' => 'multi_chamada']));
            
            $verificarPresenca = $presenca->verificarPresenca();
            
            if (count($verificarPresenca) > 0 && !$multi_chamada->configuracao->valor) {
                $erroAlune++;
            } else {
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

    }
?>