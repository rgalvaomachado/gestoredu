<?php
    include_once(dirname(__FILE__).'/../model/Grupo.php');
    include_once(dirname(__FILE__).'/../model/Usuario.php');

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
            $grup = new Grupo();
            $grup->id = $post['id'];
            $grupo = $grup->buscar();

            $usuario = new Usuario();
            $usuario->grupos = $post['id'];
            $usuarios = $usuario->buscarUsuariosGrupo();
            $grupo['usuarios'] = $usuarios;

            if(!empty($grupo)){
                return json_encode([
                    "access" => true,
                    "grupo" => $grupo,
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