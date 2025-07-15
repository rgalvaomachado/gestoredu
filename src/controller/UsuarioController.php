<?php
    class UsuarioController {
        function buscarTodos($post = []){
            $usuario = new Usuario();
            $usuarios = $usuario->searchAll();
            return json_encode([
                "access" => true,
                "usuarios" => $usuarios
            ]);
        }

        function buscarPorGrupos($grupos){
            $usuario = new Usuario();
            $usuarios = $usuario->buscarPorGrupos($grupos);
            return json_encode([
                "access" => true,
                "usuarios" => $usuarios
            ]);
        }
        
        function buscar($post){
            $user = new Usuario();
            $usuario = $user->search([
                'id' => $post['id']
            ]);

            $usuario['senha'] = isset($usuario['senha']) ? base64_decode($usuario['senha']) : null;
            if(!empty($usuario)){
                return json_encode([
                    "access" => true,
                    "usuario" => $usuario,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Usuario não encontrado"
                ]);
            }
        }

        function buscarByName($post){
            $nome = urldecode($post['nome']);
            $grupo = urldecode($post['grupo']);
            $usuario = new Usuario();
            $usuarios = $usuario->buscarPorNome($nome, $grupo);

            if (count($usuarios) > 0){
                return json_encode([
                    "access" => true,
                    "usuarios" => $usuarios
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Nenhum usuario encontrado"
                ]);
            }
        }

        function criar($post){
            $usuario = new Usuario();
            $id = $usuario->create([
                'nome' => $post['nome'],
                'data_nascimento' => $post['data_nascimento'] ?? NULL,
                'rg' => $post['rg'] ?? NULL,
                'cpf' => $post['cpf'] ?? NULL,
                'rua' => $post['rua'] ?? NULL,
                'numero' => $post['numero'] ?? NULL,
                'bairro' => $post['bairro'] ?? NULL,
                'cidade' => $post['cidade'] ?? NULL,
                'telefone' => $post['telefone'] ?? NULL,
                'email' => $post['email'] ?? NULL,
                'senha' => isset($post['senha']) ? base64_encode($post['campo']) : NULL,
                'data_inscricao' => date("Y-m-d"),
            ]);

            $UsuarioGrupo = new UsuarioGrupo();
            $UsuarioGrupo->cod_usuario = $id;
            $UsuarioGrupo->vinculo($post['grupos']);

            $Inscricao = new Inscricao();
            $Inscricao->cod_usuario = $id;
            $Inscricao->vinculo($post['inscricoes'] ?? []);

            $Projeto = new Projeto();
            $Projeto->cod_usuario = $id;
            $Projeto->vinculo($post['projetos'] ?? []);

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
            $Usuario = new Usuario();
            $atualizado = $Usuario->update([
                'nome' => $post['nome'],
                'data_nascimento' => $post['data_nascimento'] ?? NULL,
                'rg' => $post['rg'] ?? NULL,
                'cpf' => $post['cpf'] ?? NULL,
                'rua' => $post['rua'] ?? NULL,
                'numero' => $post['numero'] ?? NULL,
                'bairro' => $post['bairro'] ?? NULL,
                'cidade' => $post['cidade'] ?? NULL,
                'telefone' => $post['telefone'] ?? NULL,
                'email' => $post['email'] ?? NULL,
                'senha' => isset($post['senha']) ? base64_encode($post['senha']) : NULL,
                'data_inscricao' => date("Y-m-d"),
            ],
            [
                'id' => $post['id'],
            ]);

            $UsuarioGrupo = new UsuarioGrupo();
            $UsuarioGrupo->cod_usuario = $post['id'];
            $vinculado = $UsuarioGrupo->vinculo($post['grupos']);
            $atualizado+= $vinculado;

            $Inscricao = new Inscricao();
            $Inscricao->cod_usuario = $post['id'];
            $vinculado = $Inscricao->vinculo($post['inscricoes'] ?? []);
            $atualizado+= $vinculado;

            $Projeto = new Projeto();
            $Projeto->cod_usuario = $post['id'];
            $vinculado = $Projeto->vinculo($post['projetos'] ?? []);
            $atualizado+= $vinculado;

            if ($atualizado > 0){
                return json_encode([
                    "access" => true,
                    "message" => "Editado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro na Edição"
                ]);
            }
        }

        function deletar($post){
            $Usuario = new Usuario();
            $deletado = $Usuario->delete([
                'id' => $post['id']
            ]);

            if ($deletado){
                
                $Inscricao = new Inscricao();
                $Inscricao->delete([
                    'cod_usuario' => $post['id']
                ]);

                $Projeto = new Projeto();
                $Projeto->delete([
                    'cod_usuario' => $post['id']
                ]);

                return json_encode([
                    "access" => true,
                    "message" => "Deletado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro na deleção"
                ]);
            } 
        }
    }
?>