<head>
    <script src="../public/js/jquery-1.11.1.min.js"></script>
    <script src="../public/js/md5.js"></script>
    <link href="../public/css/global.css" rel="stylesheet">

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
        <label class="title">Cadastro de Comissao</label>
        <br>
        <label class="message_alert" id="messageAlert"></label>
        <br>
        <label>Nome</label>
        <br>
        <input class='input' name="nome" id="nome">
        <br>
        <label>Usuario</label>
        <br>
        <input class='input' name="usuario" id="usuario">
        <br>
        <label>Senha</label>
        <br>
        <input class='input' name="senha" id="senha" type="password">
        <br>
        <input class='button' type="button" onclick="criarComissao()" value="Cadastrar">
        <script src="view/comissao/index.js"></script>
    </div>
</div>