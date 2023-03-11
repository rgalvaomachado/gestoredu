<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
        <label class="title">Cadastro de Usuarios</label>
        <br>
        <label class="message_alert" id="messageAlert"></label>
        <br>
        <label>Nome</label>
        <br>
        <input class='input' id="nome" name="nome">
        <br>
        <label>Usuario</label>
        <br>
        <input class='input' id="usuario" name="usuario">
        <br>
        <label>Senha</label>
        <br>
        <input class='input' id="senha" name="senha" type="password">
        <br>
        <select class='input' id="representante" name="representante" onchange="buscarRepresentante()">
            <option value="">Selecione o representante</option>
        </select>
        <br>
        <label>Assinatura</label>
        </br>
        <input class='input' id="assinatura" name="assinatura" type="file">
        </br>
        <input class='button' type="button" onclick="criarRepresentante()" value="Cadastrar">
        <script src="view/representante/index.js"></script>
    </div>
</div>