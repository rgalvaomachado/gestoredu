<?php
    include_once('src/model/Projeto.php');
    include_once('src/model/Usuario.php');

    class ProjetoController{
        function buscarTodos(){
            $Projeto = new Projeto();
            $Projetos = $Projeto->buscarTodos();
            return json_encode([
                "access" => true,
                "projetos" => $Projetos
            ]);
        }

        function buscar($post){
            $Projeto = new Projeto();
            $Projeto->id = $post['id'];
            $buscarProjeto = $Projeto->buscar();

            if(!empty($buscarProjeto)){
                return json_encode([
                    "access" => true,
                    "projeto" => $buscarProjeto,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Projeto não encontrado"
                ]);
            }
        }

        function buscarProjetoUsuario($post){
            $Projeto = new Projeto();
            $Projeto->cod_usuario = $post['cod_usuario'];
            $buscarProjeto = $Projeto->buscarProjetoUsuario();

            if(!empty($buscarProjeto)){
                return json_encode([
                    "access" => true,
                    "projeto" => $buscarProjeto,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Projeto não encontrado"
                ]);
            }
        }

        function criar($post){
            $Projeto = new Projeto();
            $Projeto->nome = $post['nome'];

            $id = $Projeto->criar();
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
            $Projeto = new Projeto();
            $Projeto->id = $post['id'];
            $Projeto->nome = $post['nome'];
            $id = $Projeto->editar();
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
            $Projeto = new Projeto();
            $Projeto->id = $post['id'];
            $deletado = $Projeto->deletar();
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