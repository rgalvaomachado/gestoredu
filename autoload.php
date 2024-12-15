<?php

spl_autoload_register(function ($className) {
    // Diretórios base para as classes
    $baseDirs = [
        __DIR__ . '/src/controller/',  // Para controladores
        __DIR__ . '/src/database/',    // Para banco de dados
        __DIR__ . '/src/model/',       // Para modelos,
        __DIR__ . '/src/router/',      // Para rotas,
    ];

    // Verificar em cada diretório se o arquivo existe
    foreach ($baseDirs as $baseDir) {
        // Caminho completo do arquivo da classe
        $file = $baseDir . $className . '.php';

        // Verifica se o arquivo da classe existe
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    // Caso a classe não seja encontrada, você pode lançar um erro ou lidar com isso de outra forma.
    throw new Exception("Classe '{$className}' não encontrada.");
});
