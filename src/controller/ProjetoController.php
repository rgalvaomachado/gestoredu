<?php
    class ProjetoController{
        function buscarTodos(){
            $Projeto = new Projeto();
            $Projetos = $Projeto->read();
            return json_encode([
                "access" => true,
                "projetos" => $Projetos
            ]);
        }

        function buscar($post){
            $Projeto = new Projeto();
            $buscarProjeto = $Projeto->readFirst([
                'id' => $post['id']
            ]);

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
            $Projeto = new UsuarioProjeto();
            $Projeto->cod_usuario = $post['cod_usuario'];
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

        function criar($post){
            $Projeto = new Projeto();
            $id = $Projeto->create([
                'nome' => $post['nome']
            ]);
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
            $atualizado = $Projeto->update(
                [
                    'nome' => $post['nome']
                ],
                [
                    'id' => $post['id']
                ]
            );

            if ($atualizado > 0) {
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
            $deletado = $Projeto->delete([
                'id' => $post['id']
            ]);
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