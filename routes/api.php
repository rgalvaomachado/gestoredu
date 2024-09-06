<?php
    $api = [
        // [METODO, ENDPOINT, CONTROLLER, FUNCTION]
        ['GET','/verifica-login','LoginController','verificaLogin'],
        ['GET','/verifica-sessao','LoginController','verificaSessão'],
        ['POST','/login','LoginController','login'],
        ['GET','/logout','LoginController','logout'],
        ['GET','/primeiro-login','LoginController','primeiroLogin'],

        ['GET','/usuarios','UsuarioController','buscarTodos'],
        ['GET','/usuario','UsuarioController','buscar'],
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

        ['GET','/salas','SalaController','buscarTodos'],
        ['GET','/sala','SalaController','buscar'],
        ['POST','/sala','SalaController','criar'],
        ['PUT','/sala','SalaController','editar'],
        ['DELETE','/sala','SalaController','deletar'],

        ['POST','/presenca-listada','PresencaController','criarPresencaListada'],
        ['POST','/presenca-individual','PresencaController','criarPresencaInvidual'],

        ['POST','/relatorio-chamada','RelatorioController','relatorioChamada'],

        ['POST','/gerar-certificado','CertificadoController','gerarCertificado'],

        ['POST','/configurar','ConfiguracaoController','configurar'],

    ];
