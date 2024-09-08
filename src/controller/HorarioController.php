<?php
    include_once('src/model/Horario.php');

    class HorarioController{
        function buscarTodos($post){
            $Horario = new Horario();
            $Horario->cod_usuario = isset($post['cod_usuario']) ? $post['cod_usuario'] : null;
            $Horario->cod_sala = isset($post['cod_sala']) ? $post['cod_sala'] : null;
            $Horario->cod_disciplina = isset($post['cod_disciplina']) ? $post['cod_disciplina'] : null;
            $Horario->dia_semana = isset($post['dia_semana']) ? $post['dia_semana'] : null;
            $horarios = $Horario->buscarTodos();
            return json_encode([
                "access" => true,
                "horarios" => $horarios
            ]);
        }

        function buscar($post){
            $Horario = new Horario();
            $Horario->id = $post['id'];
            $buscar = $Horario->buscar();

            if(!empty($buscar)){
                return json_encode([
                    "access" => true,
                    "horario" => $buscar,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Sala não encontrado"
                ]);
            }
        }

        function criar($post){
            $Horario = new Horario();
            $Horario->cod_usuario = $post['cod_usuario'];
            $Horario->cod_sala = $post['cod_sala'];
            $Horario->cod_disciplina = $post['cod_disciplina'];
            $Horario->dia_semana = $post['dia_semana'];
            $Horario->hora_inicio = $post['hora_inicio'];
            $Horario->hora_fim = $post['hora_fim'];
            $Horario->cor = $post['cor'];

            $id = $Horario->criar();
            if ($id > 0){
                return json_encode([
                    "access" => true,
                    "message" => "Criado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro no cadastro"
                ]);
            }
        }

        function editar($post){
            $Horario = new Horario();
            $Horario->id = $post['id'];
            $Horario->cod_usuario = $post['cod_usuario'];
            $Horario->cod_sala = $post['cod_sala'];
            $Horario->cod_disciplina = $post['cod_disciplina'];
            $Horario->dia_semana = $post['dia_semana'];
            $Horario->hora_inicio = $post['hora_inicio'];
            $Horario->hora_fim = $post['hora_fim'];
            $Horario->cor = $post['cor'];

            $id = $Horario->editar();

            if ($id > 0) {
                return json_encode([
                    "access" => true,
                    "message" => "Editado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro na edição"
                ]);
            }
        }

        function deletar($post){
            $Horario = new Horario();
            $Horario->id = $post['id'];
            $deletado = $Horario->deletar();
            if ($deletado){
                return json_encode([
                    "access" => true,
                    "message" => "Deletado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro na exclusão"
                ]);
            }  
        }
    }
?>