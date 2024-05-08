<head>
    <?php include_once('src/controller/GrupoController.php')?>
    <?php include_once('src/controller/DisciplinaController.php')?>
    <?php include_once('src/controller/SalaController.php')?>

    <link href="/public/view/professor/styles.css" rel="stylesheet">
    <script src="/public/view/professor/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <form id="criar">
        <div class="grid-item-content">
            <?php include_once('public/top.php')?>
            <label class="title">Criar Professor(a)</label>
            <br>
            <label class="message_alert" id="messageAlert"></label>
            <br>
            <label>Nome Completo</label>
            <br>
            <input class='input' id="nome" name="nome" required>
            <br>
            <br>
            <label>Data de Nascimento</label>
            <br>
            <input id="data_nascimento" name="data_nascimento" type="date" class="input" required>
            <br>
            <div class="grid-endereco">
                <div class="grid-endereco-item">
                    <label>RG</label>
                    <br>
                    <input type='number' class='input' id="rg" name="rg">
                </div>
                <div class="grid-endereco-item">
                </div>
                <div class="grid-endereco-item">
                    <label>CPF</label>
                    <br>
                    <input type='number' class='input' id="cpf" name="cpf">
                </div>
            </div>
            <br>
            <label>Endereço</label>
            <br>
            <br>
            <div class="grid-endereco">
                <div class="grid-endereco-item">
                    <label>Rua</label>
                    <br>
                    <input class='input' id="rua" name="rua" required>
                </div>
                <div class="grid-endereco-item">
                    <label>Numero</label>
                    <br>
                    <input type="number" min='0' class='input' id="numero" name="numero" required>
                </div>
                <div class="grid-endereco-item">
                    <label>Bairro</label>
                    <br>
                    <input class='input' id="bairro" name="bairro" required>
                </div>
            </div>
            <br>
            <div class="grid-endereco">
                <div class="grid-endereco-item">
                    <label>Cidade</label>
                    <br>
                    <input type='text' class='input' id="cidade" name="cidade" required>
                </div>
                <div class="grid-endereco-item">
                </div>
                <div class="grid-endereco-item">
                    <label>Estado</label>
                    <br>
                    <input type='text' class='input' id="estado" name="estado" required>
                </div>
            </div>
            <br>
            <label>Telefone</label>
            <br>
            <input class='input' type="number" id="telefone" name="telefone" required>
            <br>
            <label>Email</label>
            <br>
            <input class='input' type="email" id="email" name="email" required>
            <br>
            <label>Senha</label>
            <br>
            <input class='input' type="password" id="senha" name="senha" required>
            <input type="hidden" id="grupos" value="2">
            <br>
            <label>Disciplinas</label>
            <br>
            <?php
                $DisciplinaController = new DisciplinaController();
                $disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
            ?>
            <div id='gruposTodos'>
                <?php foreach ($disciplinas as $disciplina) { ?>
                    <input type='checkbox' id="disciplinas" name="disciplinas[]" value="<?php echo $disciplina->id ?>"><?php echo $disciplina->nome ?>
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
                    <input type='checkbox' id="salas" name="salas[]" value="<?php echo $sala->id ?>"><?php echo $sala->nome ?>
                <?php } ?>
            </div>
            <br>
            <input class='button' type="submit" value="Criar">
        </div>
    </form>
</div>