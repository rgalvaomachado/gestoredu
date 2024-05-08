<?php
    include_once('src/model/Grupo.php');
    include_once('src/model/Usuario.php');

    class GrupoController{
        function buscarTodos(){
            $Grupo = new Grupo();
            $grupos = $Grupo->buscarTodos();
            return json_encode([
                "access" => true,
                "grupos" => $grupos
            ]);
        }

        function buscar($post){
            $Grupo = new Grupo();
            $Grupo->id = $post['id'];
            $buscarGrupo = $Grupo->buscar();

            $usuario = new Usuario();
            $usuario->grupos = $post['id'];
            $usuarios = $usuario->buscarTodos();
            $buscarGrupo['usuarios'] = $usuarios;

            if(!empty($buscarGrupo)){
                return json_encode([
                    "access" => true,
                    "grupo" => $buscarGrupo,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Grupo não encontrado"
                ]);
            }
        }

        function criar($post){
            $grupo = new Grupo();
            $grupo->nome = $post['nome'];

            $id = $grupo->criar();
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
            $grupo = new Grupo();
            $grupo->id = $post['id'];
            $grupo->nome = $post['nome'];
            $id = $grupo->editar();
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
            $grupo = new Grupo();
            $grupo->id = $post['id'];
            $deletado = $grupo->deletar();
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