<?php
    include_once('DisciplinaController.php');
    include_once('LoginController.php');
    include_once('PresencaController.php');
    include_once('SalaController.php');
    include_once('RelatorioController.php');
    include_once('CertificadoController.php');
    include_once('UsuarioController.php');
    include_once('GrupoController.php');

    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

    switch($metodo){
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
        case 'criarDisciplina':
            $DisciplinaController = new DisciplinaController();
            $response = $DisciplinaController->criarDisciplina($_POST);
            break;
        case 'getDisciplina':
            $DisciplinaController = new DisciplinaController();
            $response = $DisciplinaController->getDisciplina($_POST);
            break;
        case 'getDisciplinas':
            $DisciplinaController = new DisciplinaController();
            $response = $DisciplinaController->getDisciplinas($_POST);
            break;
        case 'salvarDisciplina':
            $DisciplinaController = new DisciplinaController();
            $response = $DisciplinaController->salvarDisciplina($_POST);
            break;
        case 'excluirDisciplina':
            $DisciplinaController = new DisciplinaController();
            $response = $DisciplinaController->excluirDisciplina($_POST);
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
        case 'buscarPresencaAlune':
            $PresencaController = new PresencaController();
            $response = $PresencaController->buscarPresencaAlune($_POST);
            break;
        case 'justificarPresencaAlune':
            $PresencaController = new PresencaController();
            $response = $PresencaController->justificarPresencaAlune($_POST);
            break;
        case 'buscarPresencaReuniao':
            $PresencaController = new PresencaController();
            $response = $PresencaController->buscarPresencaReuniao($_POST);
            break;
        case 'justificarPresencaReuniao':
            $PresencaController = new PresencaController();
            $response = $PresencaController->justificarPresencaReuniao($_POST);
            break;
        case 'buscarPresencaMonitore':
            $PresencaController = new PresencaController();
            $response = $PresencaController->buscarPresencaMonitore($_POST);
            break;
        case 'editarPresencaMonitore':
            $PresencaController = new PresencaController();
            $response = $PresencaController->editarPresencaMonitore($_POST);
            break;
        case 'buscarPresencaTutore':
            $PresencaController = new PresencaController();
            $response = $PresencaController->buscarPresencaTutore($_POST);
            break;
        case 'editarPresencaTutore':
            $PresencaController = new PresencaController();
            $response = $PresencaController->editarPresencaTutore($_POST);
            break;

        case 'criarPresencaAlune':
            $PresencaController = new PresencaController();
            $response = $PresencaController->criarPresencaAlune($_POST);
            break;
        case 'criarPresencaTutore':
            $PresencaController = new PresencaController();
            $response = $PresencaController->criarPresencaTutore($_POST);
            break;
        case 'criarPresencaMonitore':
            $PresencaController = new PresencaController();
            $response = $PresencaController->criarPresencaMonitore($_POST);
            break;
        case 'criarPresencaReuniao':
            $PresencaController = new PresencaController();
            $response = $PresencaController->criarPresencaReuniao($_POST);
            break;    
        ///////////////////////////////////////////////////////////////////////////////
        case 'relatorioPresencaAlune':
            $RelatorioController = new RelatorioController();
            $response = $RelatorioController->relatorioPresencaAlune($_POST);
            break; 
        case 'relatorioPresencaReuniao':
            $RelatorioController = new RelatorioController();
            $response = $RelatorioController->relatorioPresencaReuniao($_POST);
            break; 
        case 'relatorioPresencaMonitore':
            $RelatorioController = new RelatorioController();
            $response = $RelatorioController->relatorioPresencaMonitore($_POST);
            break; 
        case 'relatorioPresencaTutore':
            $RelatorioController = new RelatorioController();
            $response = $RelatorioController->relatorioPresencaTutore($_POST);
            break; 
        ///////////////////////////////////////////////////////////////////////////////
        case 'certificadoTutore':
            $CertificadoController = new CertificadoController();
            $response = $CertificadoController->certificadoTutore($_POST);
            break; 
        case 'certificadoMonitore':
            $CertificadoController = new CertificadoController();
            $response = $CertificadoController->certificadoMonitore($_POST);
            break; 
        ///////////////////////////////////////////////////////////////////////////////
        case 'criarSala':
            $SalaController = new SalaController();
            $response = $SalaController->criarSala($_POST);
            break;
        case 'getSala':
            $SalaController = new SalaController();
            $response = $SalaController->getSala($_POST);
            break;
        case 'getSalas':
            $SalaController = new SalaController();
            $response = $SalaController->getSalas($_POST);
            break;
        case 'salvarSala':
            $SalaController = new SalaController();
            $response = $SalaController->salvarSala($_POST);
            break;
        case 'excluirSala':
            $SalaController = new SalaController();
            $response = $SalaController->excluirSala($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        default:
            $response = json_encode([
                "access" => false,
                "message" => "Método não encontrado"
            ]);
    }

    echo $response;
?>