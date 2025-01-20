<?php
    class UsuarioController extends Controller{
        function buscarTodos($post = []){
            $usuario = new Usuario();
            $usuarios = $usuario->read();
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
            $usuario = $user->readFirst([
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

        function criar($post){
            $usuario = new Usuario();
            $id = $usuario->create([
                'nome' => $post['nome'],
                'data_nascimento' => $post['data_nascimento'],
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

            if(!empty($post['grupos'])){
                $UsuarioGrupo = new UsuarioGrupo();
                $UsuarioGrupo->cod_usuario = $id;
                $UsuarioGrupo->vinculo($post['grupos']);
            }

            if(!empty($post['matriculas'])){
                $Matricula = new Matricula();
                $Matricula->cod_usuario = $id;
                $Matricula->vinculo($post['matriculas']);
            }
            
            if(!empty($post['atribuicoes'])){
                $Atribuicao = new Atribuicao();
                $Atribuicao->cod_usuario = $id;
                $Atribuicao->vinculo($post['atribuicoes']);
            }

            if (isset($post['projeto']) && $post['projeto'] != ''){
                $projeto = new Projeto();
                $idProjeto = $projeto->create([
                    'nome' => $post['projeto']
                ]);
                $UsuarioProjeto = new UsuarioProjeto();
                $UsuarioProjeto->cod_usuario = $id;
                $UsuarioProjeto->vinculo([
                    (object)[
                        'cod_projeto' => $idProjeto
                    ]
                ]);
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
            $Usuario = new Usuario();
            $atualizado = $Usuario->update([
                'nome' => $post['nome'],
                'data_nascimento' => $post['data_nascimento'],
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

            if(!empty($post['grupos'])){
                $UsuarioGrupo = new UsuarioGrupo();
                $UsuarioGrupo->cod_usuario = $post['id'];
                $vinculado = $UsuarioGrupo->vinculo($post['grupos']);
            }

            $atualizado+= $vinculado;

            if (isset($post['projeto']) && $post['projeto'] != ''){
                $projeto = new Projeto();
                $idProjeto = $projeto->create([
                    'nome' => $post['projeto']
                ]);
                $UsuarioProjeto = new UsuarioProjeto();
                $UsuarioProjeto->cod_usuario = $post['id'];
                $vinculado = $UsuarioProjeto->vinculo([
                    (object)[
                        'cod_projeto' => $idProjeto
                    ]
                ]);
            }

            $atualizado+= $vinculado;

            if(!empty($post['matriculas'])){
                $Matricula = new Matricula();
                $Matricula->cod_usuario = $post['id'];
                $vinculado = $Matricula->vinculo($post['matriculas']);
            }

            $atualizado+= $vinculado;

            if(!empty($post['atribuicoes'])){
                $Atribuicao = new Atribuicao();
                $Atribuicao->cod_usuario = $post['id'];
                $vinculado = $Atribuicao->vinculo($post['atribuicoes']);
            }

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
                
                $Matricula = new Matricula();
                $Matricula->delete([
                    'cod_usuario' => $Usuario->id
                ]);

                $Atribuicao = new Atribuicao();
                $Atribuicao->delete([
                    'cod_usuario' => $Usuario->id
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