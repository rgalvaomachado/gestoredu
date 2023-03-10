<?php
    include_once('AluneController.php');
    include_once('ComissaoController.php');
    include_once('DisciplinaController.php');
    include_once('LoginController.php');
    include_once('MonitoreController.php');
    include_once('PresencaController.php');
    include_once('RepresentanteController.php');
    include_once('SalaController.php');
    include_once('TutoreController.php');
    include_once('RelatorioController.php');
    include_once('CertificadoController.php');

    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

    switch($metodo){
        case 'criarAlune':
            $AluneController = new AluneController();
            $response = $AluneController->criarAlune($_POST);
            break;
        case 'getAlunes':
            $AluneController = new AluneController();
            $response = $AluneController->getAlunes($_POST);
            break;
        case 'getAlune':
            $AluneController = new AluneController();
            $response = $AluneController->getAlune($_POST);
            break;
        case 'getAlunesSala':
            $AluneController = new AluneController();
            $response = $AluneController->getAlunesSala($_POST);
            break;
        case 'salvarAlune':
            $AluneController = new AluneController();
            $response = $AluneController->salvarAlune($_POST);
            break;
        case 'excluirAlune':
            $AluneController = new AluneController();
            $response = $AluneController->excluirAlune($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'getComissoes':
            $ComissaoController = new ComissaoController();
            $response = $ComissaoController->getComissoes($_POST);
            break; 
        case 'getComissao':
            $ComissaoController = new ComissaoController();
            $response = $ComissaoController->getComissao($_POST);
            break;
        case 'criarComissao':
            $ComissaoController = new ComissaoController();
            $response = $ComissaoController->criarComissao($_POST);
            break;
        case 'salvarComissao':
            $ComissaoController = new ComissaoController();
            $response = $ComissaoController->salvarComissao($_POST);
            break;
        case 'excluirComissao':
            $ComissaoController = new ComissaoController();
            $response = $ComissaoController->excluirComissao($_POST);
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
        case 'criarMonitore':
            $MonitoreController = new MonitoreController();
            $response = $MonitoreController->criarMonitore($_POST);
            break;
        case 'getMonitores':
            $MonitoreController = new MonitoreController();
            $response = $MonitoreController->getMonitores($_POST);
            break; 
        case 'getMonitore':
            $MonitoreController = new MonitoreController();
            $response = $MonitoreController->getMonitore($_POST);
            break;
        case 'salvarMonitore':
            $MonitoreController = new MonitoreController();
            $response = $MonitoreController->salvarMonitore($_POST);
            break;
        case 'excluirMonitore':
            $MonitoreController = new MonitoreController();
            $response = $MonitoreController->excluirMonitore($_POST);
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
        case 'getRepresentantes':
            $RepresentanteController = new RepresentanteController();
            $response = $RepresentanteController->getRepresentantes($_POST);
            break; 
        case 'criarRepresentante':
            $RepresentanteController = new RepresentanteController();
            $response = $RepresentanteController->criarRepresentante($_POST, $_FILES);
            break; 
        case 'getRepresentante':
            $RepresentanteController = new RepresentanteController();
            $response = $RepresentanteController->getRepresentante($_POST);
            break; 
        case 'salvarRepresentante':
            $RepresentanteController = new RepresentanteController();
            $response = $RepresentanteController->salvarRepresentante($_POST, $_FILES);
            break; 
        case 'salvaAssinaturaRepresentante':
            $RepresentanteController = new RepresentanteController();
            $response = $RepresentanteController->salvaAssinaturaRepresentante($_POST, $_FILES);
            break; 
        case 'excluirRepresentante':
            $RepresentanteController = new RepresentanteController();
            $response = $RepresentanteController->excluirRepresentante($_POST);
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
        case 'criarTutore':
            $TutoreController = new TutoreController();
            $response = $TutoreController->criarTutore($_POST);
            break;
        case 'getTutore':
            $TutoreController = new TutoreController();
            $response = $TutoreController->getTutore($_POST);
            break;
        case 'getTutores':
            $TutoreController = new TutoreController();
            $response = $TutoreController->getTutores($_POST);
            break;
        case 'salvarTutore':
            $TutoreController = new TutoreController();
            $response = $TutoreController->salvarTutore($_POST);
            break;
        case 'excluirTutore':
            $TutoreController = new TutoreController();
            $response =$TutoreController->excluirTutore($_POST);
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