<head>
    <?php include_once('src/controller/GrupoController.php')?>
    <?php include_once('src/controller/DisciplinaController.php')?>
    <?php include_once('src/controller/SalaController.php')?>
    <link href="/public/view/aluno/styles.css" rel="stylesheet">
    <script src="/public/view/aluno/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <form id="criar">
        <div class="grid-item-content">
            <?php include_once('public/top.php')?>
            <?php include_once('public/configuracao.php') ?>
            <label class="title">Criar Aluno(a)</label>
            <br>
            <label class="message_alert" id="messageAlert"></label>
            <br>
            <label>Nome Completo</label>
            <label class="obrigatorio">*</label>
            <br>
            <input class='input' id="nome" name="nome" required>
            <br>
            <label>Titulo do Trabalho</label>
            <br>
            <input class='input' id="projeto" name="projeto">
            <br>
            <?php if ($aluno_nascimento){ ?>
                <label>Data de Nascimento</label>
                <br>
                <input id="data_nascimento" name="data_nascimento" type="date" class="input">
                <br>
            <?php } ?>
            <?php if ($aluno_rg){ ?>
                    <label>RG</label>
                    <br>
                    <input type='number' class='input' id="rg" name="rg">
                    <br>
            <?php } ?>
            <?php if ($aluno_cpf){ ?>
                <label>CPF</label>
                <br>
                <input type='number' class='input' id="cpf" name="cpf">
                <br>
            <?php } ?>
            <?php if ($aluno_endereco){ ?>
                <label>Endereço</label>
                <br>
                <br>
                <div class="grid-endereco">
                    <div class="grid-endereco-item">
                        <label>Rua</label>
                        <br>
                        <input class='input' id="rua" name="rua">
                    </div>
                    <div class="grid-endereco-item">
                        <label>Numero</label>
                        <br>
                        <input type="number" min='0' class='input' id="numero" name="numero">
                    </div>
                    <div class="grid-endereco-item">
                        <label>Bairro</label>
                        <br>
                        <input class='input' id="bairro" name="bairro">
                    </div>
                </div>
                <br>
                <div class="grid-endereco">
                    <div class="grid-endereco-item">
                        <label>Cidade</label>
                        <br>
                        <input type='text' class='input' id="cidade" name="cidade">
                    </div>
                    <div class="grid-endereco-item">
                    </div>
                    <div class="grid-endereco-item">
                        <label>Estado</label>
                        <br>
                        <input type='text' class='input' id="estado" name="estado">
                    </div>
                </div>
                <br>
            <?php } ?>
            <?php if ($aluno_telefone){ ?>
                <label>Telefone</label>
                <br>
                <input class='input' type="number" id="telefone" name="telefone">
                <br>
            <?php } ?>
            <label>Email</label>
            <br>
            <input class='input' type="email" id="email" name="email">
            <br>
            <label>Senha</label>
            <br>
            <input class='input' type="password" id="senha" name="senha">
            <input type="hidden" id="grupos" value="1">
            <br>
            <label>Disciplinas</label>
            <br>
            <?php
                $DisciplinaController = new DisciplinaController();
                $disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
            ?>
            <div id='gruposTodos'>
                <?php foreach ($disciplinas as $disciplina) { ?>
                    <input type='checkbox' class="checkbox" id="disciplinas" name="disciplinas[]" value="<?php echo $disciplina->id ?>"> <?php echo $disciplina->nome ?>
                    <br>
                <?php } ?>
            </div>
            <br>
            <label>Salas</label>
            <br>
            <?php
                $SalaController = new SalaController();
                $salas = json_decode($SalaController->buscarTodos())->salas;
            ?>
            <div id='gruposTodos'>
                <?php foreach ($salas as $sala) { ?>
                    <input type='checkbox' class="checkbox" id="salas" name="salas[]" value="<?php echo $sala->id ?>"> <?php echo $sala->nome ?>
                    <br>
                <?php } ?>
            </div>
            <br>
            <input class='button' type="submit" value="Criar">
        </div>
    </form>
</div>