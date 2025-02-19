# CapiPHP Framework

<div align="center">
  <img src="/public/icon/favicon1.png" alt="Logo do Projeto" width="200" height="200">
</div>

CapiPHP é um framework PHP leve e eficiente, projetado para simplificar o desenvolvimento de aplicações web robustas e escaláveis. Ele oferece uma arquitetura modular, facilitando a organização do código e a integração de novas funcionalidades.

---

# Configuração do Ambiente

Este repositório contém um projeto que requer a configuração de um ambiente específico para funcionar corretamente. Siga os passos abaixo para configurar o ambiente e garantir que tudo esteja funcionando corretamente.

## Pré-requisitos

- Acesso ao banco de dados que será importado.
- Um servidor com suporte a PHP.
- Docker e Docker Compose instalados.

## Passos para Configuração

1. **Executar com Docker**

   Este projeto inclui suporte para Docker. Para iniciar os serviços necessários usando Docker Compose:

   - Certifique-se de que o Docker e o Docker Compose estão instalados.
   - No diretório raiz do projeto, execute o seguinte comando:

     ```bash
     docker-compose up -d
     ```

   - Este comando irá iniciar os contêineres em segundo plano.
   - Verifique os logs para garantir que tudo esteja funcionando corretamente:

     ```bash
     docker-compose logs -f
     ```

2. **Importar o banco de dados**

   O banco de dados necessário está localizado no diretório `/database` do projeto. Para importar:

   - Acesse seu cliente de banco de dados preferido (ex: MySQL Workbench, phpMyAdmin ou linha de comando).
   - Importe o arquivo localizado em `/database` para o seu banco de dados.
   - Certifique-se de que a importação foi concluída sem erros.

3. **Configurar o arquivo `env.php`**

   Crie ou edite o arquivo `env.php` no diretório raiz do projeto com as seguintes informações:

   ```php
   <?php

   $_ENV['DATABASE_USERNAME'] = 'username do banco de dados';
   $_ENV['DATABASE_PASSWORD'] = 'senha do banco de dados';
   $_ENV['DATABASE_HOST'] = 'ip do servidor do banco de dados';
   $_ENV['DATABASE_NAME'] = 'nome do database';
   ```

   - Substitua `username do banco de dados` pelo nome de usuário do banco de dados.
   - Substitua `senha do banco de dados` pela senha do banco de dados.
   - Substitua `ip do servidor do banco de dados` pelo endereço IP ou hostname do servidor.
   - Substitua `nome do database` pelo nome do banco de dados que você acabou de importar.

4. **Testar a Conexão**

   Após configurar o arquivo `env.php` e iniciar os contêineres, verifique se o projeto está funcionando corretamente. Caso haja erros relacionados à conexão com o banco de dados, revise as informações no arquivo `env.php` e as configurações do Docker.

## Observações

- Certifique-se de que o arquivo `env.php` não seja enviado ao controle de versão (adicione-o ao `.gitignore`, se necessário).
- Se precisar de ajuda adicional, entre em contato com o administrador do projeto.

---

Agora você está pronto para configurar o ambiente e começar a usar o projeto!
