<?php
    include_once('DisciplinaController.php');
    include_once('LoginController.php');
    include_once('PresencaController.php');
    include_once('SalaController.php');
    include_once('RelatorioController.php');
    include_once('CertificadoController.php');
    include_once('UsuarioController.php');
    include_once('GrupoController.php');
    include_once('ConfiguracaoController.php');

    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

    switch($metodo){
        case 'buscarUsuarios':
            $usuario = new UsuarioController();
            $response = $usuario->buscarTodos($_POST);
            break;
        case 'buscarUsuario':
            $usuario = new UsuarioController();
            $response = $usuario->buscar($_POST);
            break;
        case 'criarUsuario':
            $usuario = new UsuarioController();
            $response = $usuario->criar($_POST);
            break;
        case 'editarUsuario':
            $usuario = new UsuarioController();
            $response = $usuario->editar($_POST);
            break;
        case 'deletarUsuario':
            $usuario = new UsuarioController();
            $response = $usuario->deletar($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'buscarGrupo':
            $grupo = new GrupoController();
            $response = $grupo->buscar($_POST);
            break;
        case 'criarGrupo':
            $grupo = new GrupoController();
            $response = $grupo->criar($_POST);
            break;
        case 'editarGrupo':
            $grupo = new GrupoController();
            $response = $grupo->editar($_POST);
            break;
        case 'deletarGrupo':
            $grupo = new GrupoController();
            $response = $grupo->deletar($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'buscarDisciplina':
            $DisciplinaController = new DisciplinaController();
            $response = $DisciplinaController->buscar($_POST);
            break;
        case 'criarDisciplina':
            $DisciplinaController = new DisciplinaController();
            $response = $DisciplinaController->criar($_POST);
            break;
        case 'editarDisciplina':
            $DisciplinaController = new DisciplinaController();
            $response = $DisciplinaController->editar($_POST);
            break;
        case 'deletarDisciplina':
            $DisciplinaController = new DisciplinaController();
            $response = $DisciplinaController->deletar($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'buscarSala':
            $SalaController = new SalaController();
            $response = $SalaController->buscar($_POST);
            break;
        case 'criarSala':
            $SalaController = new SalaController();
            $response = $SalaController->criar($_POST);
            break;
        case 'editarSala':
            $SalaController = new SalaController();
            $response = $SalaController->editar($_POST);
            break;
        case 'deletarSala':
            $SalaController = new SalaController();
            $response = $SalaController->deletar($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'verificaLogin':
            $LoginController = new LoginController();
            $response = $LoginController->verificaLogin($_POST);
            break;
        case 'verificaSessão':
            $LoginController = new LoginController();
            $response = $LoginController->verificaSessão($_POST);
            break;
        case 'login':
            $LoginController = new LoginController();
            $response = $LoginController->login($_POST);
            break;
        case 'logout':
            $LoginController = new LoginController();
            $response = $LoginController->logout($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'criarPresencaListada':
            $PresencaController = new PresencaController();
            $response = $PresencaController->criarPresencaListada($_POST);
            break;
        case 'criarPresencaInvidual':
            $PresencaController = new PresencaController();
            $response = $PresencaController->criarPresencaInvidual($_POST);
            break;
        // case 'editarPresencaUsuario':
        //     $PresencaController = new PresencaController();
        //     $response = $PresencaController->editarPresencaMonitore($_POST);
        //     break;
        // case 'justificarPresencaUsuario':
        //     $PresencaController = new PresencaController();
        //     $response = $PresencaController->justificarPresencaAlune($_POST);
        //     break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'relatorioChamada':
            $RelatorioController = new RelatorioController();
            $response = $RelatorioController->relatorioChamada($_POST);
            break; 
        ///////////////////////////////////////////////////////////////////////////////
        case 'gerarCertificado':
            $CertificadoController = new CertificadoController();
            $response = $CertificadoController->gerarCertificado($_POST);
            break; 
        ///////////////////////////////////////////////////////////////////////////////
        case 'configuracao':
            $ConfiguracaoController = new ConfiguracaoController();
            $response = $ConfiguracaoController->configurar($_POST);
            break;
        default:
            $response = json_encode([
                "access" => false,
                "message" => "Método não encontrado"
            ]);
    }

    echo $response;
?>