<?php
    include_once('src/model/Usuario.php');
    include_once('src/model/UsuarioGrupo.php');
    include_once('src/model/UsuarioSalaDisciplina.php');
    include_once('src/model/UsuarioSala.php');
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

            $Sala = new UsuarioSala();
            $Sala->cod_usuario = $post['id'];
            $salas = $Sala->usuario_sala_buscar();
            $usuario['salas'] = $salas;

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

            $id = $usuario->criar();

            $UsuarioGrupo = new UsuarioGrupo();
            $UsuarioGrupo->cod_usuario = $id;
            $UsuarioGrupo->usuario_grupo_deletar();
            if(!empty($post['grupos'])){
                foreach ($post['grupos'] as $grupo) {
                    $UsuarioGrupo->cod_usuario = $id;
                    $UsuarioGrupo->cod_grupo = $grupo;
                    $UsuarioGrupo->usuario_grupo_criar();
                }
            }

            if(!empty($post['sala_disciplinas'])){
                foreach ($post['sala_disciplinas'] as $cod_sala => $disciplinas) {
                    $UsuarioDisciplina = new UsuarioSalaDisciplina();
                    $UsuarioDisciplina->cod_usuario = $id;
                    $UsuarioDisciplina->cod_sala = $cod_sala;
                    $UsuarioDisciplina->usuario_sala_disciplina_deletar();
                    foreach ($disciplinas as $disciplina) {
                        $UsuarioDisciplina->cod_usuario = $id;
                        $UsuarioDisciplina->cod_sala = $cod_sala;
                        $UsuarioDisciplina->cod_disciplina = $disciplina;
                        $UsuarioDisciplina->usuario_sala_disciplina_criar();
                    }
                }
            }

            $UsuarioSala = new UsuarioSala();
            $UsuarioSala->cod_usuario = $id;
            $UsuarioSala->usuario_sala_deletar();
            if(!empty($post['salas'])){
                foreach ($post['salas'] as $sala) {
                    $UsuarioSala->cod_usuario = $id;
                    $UsuarioSala->cod_sala = $sala;
                    $UsuarioSala->usuario_sala_criar();
                }
            }

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

            $id = $usuario->editar();

            $UsuarioGrupo = new UsuarioGrupo();
            $UsuarioGrupo->cod_usuario = $id;
            $UsuarioGrupo->usuario_grupo_deletar();
            if(!empty($post['grupos'])){
                foreach ($post['grupos'] as $grupo) {
                    $UsuarioGrupo->cod_usuario = $id;
                    $UsuarioGrupo->cod_grupo = $grupo;
                    $UsuarioGrupo->usuario_grupo_criar();
                }
            }

            if(!empty($post['sala_disciplinas'])){
                foreach ($post['sala_disciplinas'] as $cod_sala => $disciplinas) {
                    $UsuarioDisciplina = new UsuarioSalaDisciplina();
                    $UsuarioDisciplina->cod_usuario = $id;
                    $UsuarioDisciplina->cod_sala = $cod_sala;
                    $UsuarioDisciplina->usuario_sala_disciplina_deletar();
                    foreach ($disciplinas as $disciplina) {
                        $UsuarioDisciplina->cod_usuario = $id;
                        $UsuarioDisciplina->cod_sala = $cod_sala;
                        $UsuarioDisciplina->cod_disciplina = $disciplina;
                        $UsuarioDisciplina->usuario_sala_disciplina_criar();
                    }
                }
            }

            $UsuarioSala = new UsuarioSala();
            $UsuarioSala->cod_usuario = $id;
            $UsuarioSala->usuario_sala_deletar();
            if(!empty($post['salas'])){
                foreach ($post['salas'] as $sala) {
                    $UsuarioSala->cod_usuario = $id;
                    $UsuarioSala->cod_sala = $sala;
                    $UsuarioSala->usuario_sala_criar();
                }
            }

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
            $Usuario = new Usuario();
            $Usuario->id = $post['id'];
            $deletado = $Usuario->deletar();

            $UsuarioSala = new UsuarioSala();
            $UsuarioSala->cod_usuario = $post['id'];
            $salas = $UsuarioSala->usuario_sala_buscar();
            foreach ($salas as $sala) {
                $UsuarioSalaDisciplina = new UsuarioSalaDisciplina();
                $UsuarioSalaDisciplina->cod_usuario = $post['id'];
                $UsuarioSalaDisciplina->cod_sala = $sala;
                $UsuarioSalaDisciplina->usuario_sala_disciplina_deletar();
            }
            $UsuarioSala->usuario_sala_deletar();

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

        function usuario_sala_disciplina_buscar($post){
            $cod_usuario = $post['cod_usuario'];
            $cod_sala = $post['cod_sala'];

            $UsuarioSalaDisciplina = new UsuarioSalaDisciplina();
            $UsuarioSalaDisciplina->cod_usuario = $cod_usuario;
            $UsuarioSalaDisciplina->cod_sala = $cod_sala;
            $usuario_sala_disciplina = $UsuarioSalaDisciplina->usuario_sala_disciplina_buscar();

            return json_encode([
                "access" => true,
                "usuario_sala_disciplina" => $usuario_sala_disciplina,
            ]);
        }
    }
?>