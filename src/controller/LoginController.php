<?php
    class LoginController 
    {
        function login($post)
        {
            $email = $post['email'];
            $senha = base64_encode($post['senha']);

            if ($post['email'] == '' || $post['senha'] == '') {
                return json_encode([
                    "access" => false,
                    "message" => "Desculpe, usuário ou senha incorreta.",
                ]);
            }

            $validado = false;

            $UsuarioController = new UsuarioController();
            $UsuarioController = json_decode($UsuarioController->buscarTodos());
            $usuarios = $UsuarioController->usuarios;
            foreach ($usuarios as $usuario) {
                if ($email == $usuario->email && $senha == $usuario->senha) {
                    $usuarioValidado = $usuario->nome;
                    $modoValidado = 'representante';
                    $validado = true;
                }
            }

            if ($validado) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $usuario = explode(' ', $usuarioValidado);
                $_SESSION['usuario'] = $usuario[0];
                $_SESSION['modo'] = $modoValidado;
                $_SESSION['logado'] = $validado;
                $_SESSION['CREATED'] = time();
                return json_encode([
                    "access" => true,
                    "modo" => $modoValidado,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Desculpe, usuário ou senha incorreta.",
                ]);
            }
        }

        function logout()
        {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['usuario'] =  "";
            $_SESSION['modo'] = "";
            session_destroy();
            return json_encode([
                "access" => true
            ]);
        }

        function verificaLogin()
        {
            if (!isset($_SESSION)) {
                session_start();
            }
            $modo = isset($_SESSION['modo']) ? $_SESSION['modo'] : "";
            if ($modo != '') {
                return json_encode([
                    "modo" => $modo,
                    "access" => true
                ]);
            } else {
                return json_encode([
                    "access" => false
                ]);
            }
        }

        function verificaSessão()
        {
            if (!isset($_SESSION)) {
                session_start();
            }
            if (time() - $_SESSION['CREATED'] > 1800) { // 30 minutos 
                $_SESSION['usuario'] =  "";
                $_SESSION['modo'] = "";
                session_destroy();
                return json_encode([
                    "access" => false
                ]);
            } else {
                $_SESSION['CREATED'] = time();
                return json_encode([
                    "access" => true
                ]);
            }
        }

        function primeiroLogin($post)
        {
            $UsuarioController = new UsuarioController();
            $response = json_decode($UsuarioController->buscarTodos());
            $usuarios = count($response->usuarios);
            if ($usuarios > 0) {
                return false;
            } else {
                if (isset($post['nome']) && isset($post['grupos']) && isset($post['email']) && isset($post['senha'])) {

                    $UsuarioController->criar([
                        'nome' => $post['nome'],
                        'grupos' => $post['grupos'],
                        'email' => $post['email'],
                        'senha' => $post['senha'],
                    ]);

                    $configuraçõesPadrao = [];
                    $ConfiguracaoController = new ConfiguracaoController();
                    foreach ($ConfiguracaoController->chaves as $chave) {
                        $configuraçõesPadrao[$chave] = 0;
                    }
                    $ConfiguracaoController->configurar($configuraçõesPadrao);

                    $GrupoController = new GrupoController();
                    $GrupoController->criar([
                        'nome' => 'aluno',
                    ]);
                    $GrupoController->criar([
                        'nome' => 'professor',
                    ]);

                    return json_encode([
                        "access" => true
                    ]);
                } else {
                    return true;
                }
            }
        }
    }
