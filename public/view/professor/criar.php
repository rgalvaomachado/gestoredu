<head>
<?php include_once('src/controller/ConfiguracaoController.php')?>
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
            <?php
                $ConfiguracaoController = new ConfiguracaoController();
                $ConfiguracaoController = json_decode($ConfiguracaoController->buscarTodos([]));
                foreach ($ConfiguracaoController->configuracao as $configuracao) {
                    switch ($configuracao->chave) {
                        case 'professor_nascimento':
                            $professor_nascimento = $configuracao->valor;
                            break;
                        case 'professor_rg':
                            $professor_rg = $configuracao->valor;
                            break;
                        case 'professor_cpf':
                            $professor_cpf = $configuracao->valor;
                            break;
                        case 'professor_endereco':
                            $professor_endereco = $configuracao->valor;
                            break;
                        case 'professor_telefone':
                            $professor_telefone = $configuracao->valor;
                            break;
                    }
                }
            ?>
            <label class="title">Criar Professor(a)</label>
            <br>
            <label class="message_alert" id="messageAlert"></label>
            <br>
            <label>Nome Completo</label>
            <label class="obrigatorio">*</label>
            <br>
            <input class='input' id="nome" name="nome" required>
            <br>
            <?php if ($professor_nascimento){ ?>
                <label>Data de Nascimento</label>
                <br>
                <input id="data_nascimento" name="data_nascimento" type="date" class="input">
                <br>
            <?php } ?>
            <?php if ($professor_rg){ ?>
                    <label>RG</label>
                    <br>
                    <input type='number' class='input' id="rg" name="rg">
                    <br>
            <?php } ?>
            <?php if ($professor_cpf){ ?>
                <label>CPF</label>
                <br>
                <input type='number' class='input' id="cpf" name="cpf">
                <br>
            <?php } ?>
            <?php if ($professor_endereco){ ?>
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
            <?php if ($professor_telefone){ ?>
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