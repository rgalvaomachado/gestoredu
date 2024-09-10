<?php
    include_once('src/model/Sala.php');
    include_once('src/model/Usuario.php');
    include_once('src/model/SalaDisciplina.php');

    class SalaController{
        function buscarTodos(){
            $Sala = new Sala();
            $Salas = $Sala->buscarTodos();
            return json_encode([
                "access" => true,
                "salas" => $Salas
            ]);
        }

        function buscar($post){
            $Sala = new Sala();
            $Sala->id = $post['id'];
            $buscarSala = $Sala->buscar();

            $Usuario = new Usuario();
            $Usuario->salas = $post['id'];
            $usuarios = $Usuario->buscarTodos();
            $buscarSala['usuarios'] = $usuarios;

            $SalaDisciplina = new SalaDisciplina();
            $SalaDisciplina->cod_sala = $post['id'];
            $disciplinas = $SalaDisciplina->sala_disciplina_buscar();
            $buscarSala['disciplinas'] = $disciplinas;

            if(!empty($buscarSala)){
                return json_encode([
                    "access" => true,
                    "sala" => $buscarSala,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Sala não encontrado"
                ]);
            }
        }

        function criar($post){
            $Sala = new Sala();
            $Sala->nome = $post['nome'];

            $id = $Sala->criar();

            $SalaDisciplina = new SalaDisciplina();
            $SalaDisciplina->cod_sala = $id;
            $SalaDisciplina->sala_disciplina_deletar();
            if(!empty($post['disciplinas'])){
                foreach ($post['disciplinas'] as $disciplina) {
                    $SalaDisciplina->cod_sala = $id;
                    $SalaDisciplina->cod_disciplina = $disciplina;
                    $SalaDisciplina->sala_disciplina_criar();
                }
            }

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
            $Sala = new Sala();
            $Sala->id = $post['id'];
            $Sala->nome = $post['nome'];
            $id = $Sala->editar();

            $SalaDisciplina = new SalaDisciplina();
            $SalaDisciplina->cod_sala = $Sala->id;
            $SalaDisciplina->sala_disciplina_deletar();
            if(!empty($post['disciplinas'])){
                foreach ($post['disciplinas'] as $disciplina) {
                    $SalaDisciplina->cod_sala = $Sala->id;
                    $SalaDisciplina->cod_disciplina = $disciplina;
                    $SalaDisciplina->sala_disciplina_criar();
                }
            }

            if ($id) {
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
            $Sala = new Sala();
            $Sala->id = $post['id'];
            $deletado = $Sala->deletar();
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