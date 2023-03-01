<?php
    include_once('alune.php');
    include_once('comissao.php');
    include_once('disciplina.php');
    include_once('login.php');
    include_once('monitore.php');
    include_once('presenca.php');
    include_once('representante.php');
    include_once('sala.php');
    include_once('tutore.php');
    include_once('certificado.php');

    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 
    switch($metodo){
        case 'criarAlune':
            $AluneController = new AluneController();
            $response = $AluneController->criarAlune($_POST);
            break;
        case 'buscarAlune':
            $AluneController = new AluneController();
            $AluneController->buscarAlune($_POST);
            break;
        case 'salvarAlune':
            $AluneController = new AluneController();
            $AluneController->salvarAlune($_POST);
            break;
        case 'excluirAlune':
            $AluneController = new AluneController();
            $AluneController->excluirAlune($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'criarComissao':
            $ComissaoController = new ComissaoController();
            $ComissaoController->criarComissao($_POST);
            break;
        case 'buscarComissao':
            $ComissaoController = new ComissaoController();
            $ComissaoController->buscarComissao($_POST);
            break;
        case 'salvarComissao':
            $ComissaoController = new ComissaoController();
            $ComissaoController->salvarComissao($_POST);
            break;
        case 'excluirComissao':
            $ComissaoController = new ComissaoController();
            $ComissaoController->excluirComissao($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'criarDisciplina':
            $DisciplinaController = new DisciplinaController();
            $DisciplinaController->criarDisciplina($_POST);
            break;
        case 'buscarDisciplina':
            $DisciplinaController = new DisciplinaController();
            $DisciplinaController->buscarDisciplina($_POST);
            break;
        case 'salvarDisciplina':
            $DisciplinaController = new DisciplinaController();
            $DisciplinaController->salvarDisciplina($_POST);
            break;
        case 'excluirDisciplina':
            $DisciplinaController = new DisciplinaController();
            $DisciplinaController->excluirDisciplina($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'login':
            $LoginController = new LoginController();
            $LoginController->login($_POST);
            break;
        case 'logout':
            $LoginController = new LoginController();
            $LoginController->logout($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'criarMonitore':
            $MonitoreController = new MonitoreController();
            $MonitoreController->criarMonitore($_POST);
            break;
        case 'buscarMonitore':
            $MonitoreController = new MonitoreController();
            $MonitoreController->buscarMonitore($_POST);
            break;
        case 'salvarMonitore':
            $MonitoreController = new MonitoreController();
            $MonitoreController->salvarMonitore($_POST);
            break;
        case 'excluirMonitore':
            $MonitoreController = new MonitoreController();
            $MonitoreController->excluirMonitore($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'buscarSalaAluneJustifica':
            $PresencaController = new PresencaController();
            $PresencaController->buscarSalaAluneJustifica($_POST);
            break;
        case 'buscarPresencaAlune':
            $PresencaController = new PresencaController();
            $PresencaController->buscarPresencaAlune($_POST);
            break;
        case 'justificarPresencaAlune':
            $PresencaController = new PresencaController();
            $PresencaController->justificarPresencaAlune($_POST);
            break;
        case 'buscarPresencaReuniao':
            $PresencaController = new PresencaController();
            $PresencaController->buscarPresencaReuniao($_POST);
            break;
        case 'justificarPresencaReuniao':
            $PresencaController = new PresencaController();
            $PresencaController->justificarPresencaReuniao($_POST);
            break;
        case 'buscarPresencaMonitore':
            $PresencaController = new PresencaController();
            $PresencaController->buscarPresencaMonitore($_POST);
            break;
        case 'editarPresencaMonitore':
            $PresencaController = new PresencaController();
            $PresencaController->editarPresencaMonitore($_POST);
            break;
        case 'buscarPresencaTutore':
            $PresencaController = new PresencaController();
            $PresencaController->buscarPresencaTutore($_POST);
            break;
        case 'editarPresencaTutore':
            $PresencaController = new PresencaController();
            $PresencaController->editarPresencaTutore($_POST);
            break;
        case 'buscarSalaAlune':
            $PresencaController = new PresencaController();
            $PresencaController->buscarSalaAlune($_POST);
            break;
        case 'criarPresencaAlune':
            $PresencaController = new PresencaController();
            $PresencaController->criarPresencaAlune($_POST);
            break;
        case 'criarPresencaTutore':
            $PresencaController = new PresencaController();
            $PresencaController->criarPresencaTutore($_POST);
            break;
        case 'criarPresencaMonitore':
            $PresencaController = new PresencaController();
            $PresencaController->criarPresencaMonitore($_POST);
            break;
        case 'criarPresencaReuniao':
            $PresencaController = new PresencaController();
            $PresencaController->criarPresencaReuniao($_POST);
            break;    
        ///////////////////////////////////////////////////////////////////////////////
        case 'relatorioPresencaAlune':
            $PresencaController = new PresencaController();
            $PresencaController->relatorioPresencaAlune($_POST);
            break; 
        case 'relatorioPresencaReuniao':
            $PresencaController = new PresencaController();
            $PresencaController->relatorioPresencaReuniao($_POST);
            break; 
        case 'relatorioPresencaMonitore':
            $PresencaController = new PresencaController();
            $PresencaController->relatorioPresencaMonitore($_POST);
            break; 
        case 'relatorioPresencaTutore':
            $PresencaController = new PresencaController();
            $PresencaController->relatorioPresencaTutore($_POST);
            break; 
        ///////////////////////////////////////////////////////////////////////////////
        case 'criarRepresentante':
            $RepresentanteController = new RepresentanteController();
            $RepresentanteController->criarRepresentante($_POST, $_FILES);
            break; 
        case 'buscarRepresentante':
            $RepresentanteController = new RepresentanteController();
            $RepresentanteController->buscarRepresentante($_POST);
            break; 
        case 'salvarRepresentante':
            $RepresentanteController = new RepresentanteController();
            $RepresentanteController->salvarRepresentante($_POST, $_FILES);
            break; 
        case 'excluirRepresentante':
            $RepresentanteController = new RepresentanteController();
            $RepresentanteController->excluirRepresentante($_POST);
            break; 
        ///////////////////////////////////////////////////////////////////////////////
        case 'criarSala':
            $SalaController = new SalaController();
            $SalaController->criarSala($_POST);
            break;
        case 'buscarSala':
            $SalaController = new SalaController();
            $SalaController->buscarSala($_POST);
            break;
        case 'salvarSala':
            $SalaController = new SalaController();
            $SalaController->salvarSala($_POST);
            break;
        case 'excluirSala':
            $SalaController = new SalaController();
            $SalaController->excluirSala($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'criarTutore':
            $TutoreController = new TutoreController();
            $TutoreController->criarTutore($_POST);
            break;
        case 'buscarTutore':
            $TutoreController = new TutoreController();
            $TutoreController->buscarTutore($_POST);
            break;
        case 'salvarTutore':
            $TutoreController = new TutoreController();
            $TutoreController->salvarTutore($_POST);
            break;
        case 'excluirTutore':
            $TutoreController = new TutoreController();
            $TutoreController->excluirTutore($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'certificadoGetRepresentante':
            $CertificadoController = new CertificadoController();
            echo $CertificadoController->certificadoGetRepresentante($_POST);
            break;
        case 'certificadoGetRepresentantes':
            $CertificadoController = new CertificadoController();
            echo $CertificadoController->certificadoGetRepresentantes($_POST);
            break;
        case 'certificadoGetMonitore':
            $CertificadoController = new CertificadoController();
            echo $CertificadoController->certificadoGetMonitore($_POST);
            break;
        case 'certificadoGetMonitores':
            $CertificadoController = new CertificadoController();
            echo $CertificadoController->certificadoGetMonitores($_POST);
            break;
        case 'certificadoGetTutores':
            $CertificadoController = new CertificadoController();
            echo $CertificadoController->certificadoGetTutores($_POST);
            break;
        case 'certificadoGetTutore':
            $CertificadoController = new CertificadoController();
            echo $CertificadoController->certificadoGetTutore($_POST);
            break;
        case 'certificadoTutore':
            $CertificadoController = new CertificadoController();
            echo $CertificadoController->certificadoTutore($_POST);
            break;
        case 'certificadoMonitore':
            $CertificadoController = new CertificadoController();
            echo $CertificadoController->certificadoMonitore($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        default:
            echo "Método não encontrado";
    }
?>