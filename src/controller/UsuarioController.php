<?php
    include_once('src/model/Usuario.php');
    include_once('src/model/Projeto.php');

    class UsuarioController{
        function buscarTodos($post = []){
            $usuario = new Usuario();
            if(!empty($post['grupo'])){
                $usuario->grupos = $post['grupo'];
            }
            if(!empty($post['disciplina'])){
                $usuario->disciplinas = $post['disciplina'];
            }
            if(!empty($post['sala'])){
                $usuario->salas = $post['sala'];
            }
            $usuarios = $usuario->buscarTodos();
            return json_encode([
                "access" => true,
                "usuarios" => $usuarios
            ]);
        }
        
        function buscar($post){
            $user = new Usuario();
            $user->id = $post['id'];
            $usuario = $user->buscar();
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

            $usuario->nome                  = $post['nome'];
            $usuario->data_nascimento       = isset($post['data_nascimento'])   && $post['data_nascimento'] != '' ? $post['data_nascimento'] : null;
            $usuario->rg                    = isset($post['rg'])                && $post['rg'] != '' ? $post['rg'] : null;
            $usuario->cpf                   = isset($post['cpf'])               && $post['cpf'] != '' ? $post['cpf'] : null;
            $usuario->rua                   = isset($post['rua'])               && $post['rua'] != '' ? $post['rua'] : null;
            $usuario->numero                = isset($post['numero'])            && $post['numero'] != '' ? $post['numero'] : null;
            $usuario->bairro                = isset($post['bairro'])            && $post['bairro'] != '' ? $post['bairro'] : null;
            $usuario->cidade                = isset($post['cidade'])            && $post['cidade'] != '' ? $post['cidade'] : null;
            $usuario->estado                = isset($post['estado'])            && $post['estado'] != '' ? $post['estado'] : null;
            $usuario->telefone              = isset($post['telefone'])          && $post['telefone'] != '' ? $post['telefone'] : null;

            $usuario->email = isset($post['email']) ? $post['email'] : '' ;
            $usuario->senha = isset($post['senha']) ? base64_encode($post['senha']) : null;

            $usuario->data_inscricao        = date("Y-m-d");

            if(!empty($post['grupos'])){
                $usuario->grupos = '#'.implode("#", $post['grupos']).'#';
            }

            if(!empty($post['disciplinas'])){
                $usuario->disciplinas = '#'.implode("#", $post['disciplinas']).'#';
            }

            if(!empty($post['salas'])){
                $usuario->salas = '#'.implode("#", $post['salas']).'#';
            }

            $id = $usuario->criar();

            if (isset($post['projeto']) && $post['projeto'] != ''){
                $projeto = new Projeto();
                $projeto->cod_usuario = $id;
                $projeto->nome = $post['projeto'];
                $projeto->criar();
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
            $usuario = new Usuario();

            $usuario->id                    = $post['id'];
            $usuario->nome                  = $post['nome'];
            $usuario->data_nascimento       = isset($post['data_nascimento'])   && $post['data_nascimento'] != '' ? $post['data_nascimento'] : null;
            $usuario->rg                    = isset($post['rg'])                && $post['rg'] != '' ? $post['rg'] : null;
            $usuario->cpf                   = isset($post['cpf'])               && $post['cpf'] != '' ? $post['cpf'] : null;
            $usuario->rua                   = isset($post['rua'])               && $post['rua'] != '' ? $post['rua'] : null;
            $usuario->numero                = isset($post['numero'])            && $post['numero'] != '' ? $post['numero'] : null;
            $usuario->bairro                = isset($post['bairro'])            && $post['bairro'] != '' ? $post['bairro'] : null;
            $usuario->cidade                = isset($post['cidade'])            && $post['cidade'] != '' ? $post['cidade'] : null;
            $usuario->estado                = isset($post['estado'])            && $post['estado'] != '' ? $post['estado'] : null;
            $usuario->telefone              = isset($post['telefone'])          && $post['telefone'] != '' ? $post['telefone'] : null;

            $usuario->email = isset($post['email']) ? $post['email'] : '' ;
            $usuario->senha = isset($post['senha']) ? base64_encode($post['senha']) : null;

            if(!empty($post['grupos'])){
                $usuario->grupos = '#'.implode("#", $post['grupos']).'#';
            }
            if(!empty($post['disciplinas'])){
                $usuario->disciplinas = '#'.implode("#", $post['disciplinas']).'#';
            }
            if(!empty($post['salas'])){
                $usuario->salas = '#'.implode("#", $post['salas']).'#';
            }
            $id = $usuario->editar();

            if (isset($post['cod_projeto']) && $post['cod_projeto'] != ''){
                $projeto = new Projeto();
                $projeto->id = $post['cod_projeto'];
                $projeto->nome = $post['projeto'];
                $projeto->editar();
            } else if (isset($post['projeto']) && $post['projeto'] != ''){
                $projeto = new Projeto();
                $projeto->cod_usuario = $id;
                $projeto->nome = $post['projeto'];
                $projeto->criar();
            }

            if ($id > 0){
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
            $disciplina = new Usuario();
            $disciplina->id = $post['id'];
            $deletado = $disciplina->deletar();
            if ($deletado){
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