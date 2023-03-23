<head>
    <?php include_once('../includes/head.html')?>
    <?php include_once('../../controller/GrupoController.php')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <form id="criar">
        <div class="grid-item-content">
            <label class="title">Criar Usuarios</label>
            <br>
            <label class="message_alert" id="messageAlert"></label>
            <br>
            <label>Nome Completo</label>
            <br>
            <input class='input' id="nome" name="nome" required>
            <br>
            <label>CPF</label>
            <br>
            <input class='input' id="cpf" name="cpf">
            <br>
            <br>
            <label>Endereço</label>
            <br>
            <br>
            <div class="grid-endereco">
                <div class="grid-endereco-item">
                    <label>Rua</label>
                    <br>
                    <input class='input' id="endereco" name="endereco">
                </div>
                <div class="grid-endereco-item">
                    <label>Numero</label>
                    <br>
                    <input type="number" min='0' class='input' id="endereco" name="endereco">
                </div>
                <div class="grid-endereco-item">
                    <label>Bairro</label>
                    <br>
                    <input class='input' id="endereco" name="endereco">
                </div>
            </div>
            <br>
            <div class="grid-cep">
                <div class="grid-endereco-item">
                    <label>Cidade</label>
                    <br>
                    <input class='input' id="endereco" name="endereco">
                </div>
                <div class="grid-endereco-item">
                    <label>Estado</label>
                    <br>
                    <select class='input'>
                        <option>
                            SP
                        </option>
                    </select>
                </div>
                <div class="grid-endereco-item">
                    <label>Pais</label>
                    <br>
                    <select class='input'>
                        <option>
                            BR
                        </option>
                    </select>
                </div>
            </div>
            <br>
            <label>Email</label>
            <br>
            <input class='input' type="email" id="email" name="email" required>
            <br>
            <label>Senha</label>
            <br>
            <input class='input' id="senha" name="senha" type="password" required>
            <br>
            <label>Grupos</label>
            <br>
            <?php
                $GrupoController = new GrupoController();
                $grupos = json_decode($GrupoController->buscarTodos())->grupos;
            ?>
            <div id='gruposTodos'>
                <?php foreach ($grupos as $grupo) { ?>
                    <input type='checkbox' id="grupos" name="grupos[]" value="<?php echo $grupo->id ?>"><?php echo $grupo->nome ?>
                <?php } ?>
            </div>
            <br>
            <input class='button' type="submit" value="Criar">
        </div>
    </form>
</div>