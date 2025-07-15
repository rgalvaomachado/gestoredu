<?php
    $api = [
        // [METODO, ENDPOINT, CONTROLLER, FUNCTION]
        ['GET','/verifica-login','LoginController','verificaLogin'],
        ['GET','/verifica-sessao','LoginController','verificaSessão'],
        ['POST','/login','LoginController','login'],
        ['GET','/logout','LoginController','logout'],
        ['POST','/primeiro-login','LoginController','primeiroLogin'],

        ['GET','/usuarios','UsuarioController','buscarTodos'],
        ['GET','/usuarios/grupos','UsuarioController','buscarPorGrupos'],
        ['GET','/usuario','UsuarioController','buscar'],
        ['GET','/usuario/busca-por-nome','UsuarioController','buscarByName'],
        ['POST','/usuario','UsuarioController','criar'],
        ['PUT','/usuario','UsuarioController','editar'],
        ['DELETE','/usuario','UsuarioController','deletar'],

        ['GET','/grupos','GrupoController','buscarTodos'],
        ['GET','/grupo','GrupoController','buscar'],
        ['POST','/grupo','GrupoController','criar'],
        ['PUT','/grupo','GrupoController','editar'],
        ['DELETE','/grupo','GrupoController','deletar'],

        ['GET','/disciplinas','DisciplinaController','buscarTodos'],
        ['GET','/disciplina','DisciplinaController','buscar'],
        ['POST','/disciplina','DisciplinaController','criar'],
        ['PUT','/disciplina','DisciplinaController','editar'],
        ['DELETE','/disciplina','DisciplinaController','deletar'],

        ['GET','/projetos','ProjetoController','buscarTodos'],
        ['GET','/projeto','ProjetoController','buscar'],
        ['POST','/projeto','ProjetoController','criar'],
        ['PUT','/projeto','ProjetoController','editar'],
        ['DELETE','/projeto','ProjetoController','deletar'],

        ['GET','/salas','SalaController','buscarTodos'],
        ['GET','/sala','SalaController','buscar'],
        ['POST','/sala','SalaController','criar'],
        ['PUT','/sala','SalaController','editar'],
        ['DELETE','/sala','SalaController','deletar'],

        ['GET','/horarios','HorarioController','buscarTodos'],
        ['GET','/horario','HorarioController','buscar'],
        ['POST','/horario','HorarioController','criar'],
        ['PUT','/horario','HorarioController','editar'],
        ['DELETE','/horario','HorarioController','deletar'],

        ['POST','/presenca-listada','PresencaController','criarPresencaListada'],
        ['POST','/presenca-individual','PresencaController','criarPresencaInvidual'],

        ['GET','/inscricoes','InscricaoController','buscarTodos'],

        ['POST','/relatorio-chamada','RelatorioController','relatorioChamada'],

        ['GET','/certificado','CertificadoController','buscarTodos'],
        ['GET','/certificado','CertificadoController','buscar'],
        ['POST','/certificado','CertificadoController','criar'],
        ['PUT','/certificado','CertificadoController','editar'],
        ['DELETE','/certificado','CertificadoController','deletar'],
        ['POST','/gerar-certificado','CertificadoController','gerarCertificado'],

        ['POST','/configurar','ConfiguracaoController','configurar'],

    ];
