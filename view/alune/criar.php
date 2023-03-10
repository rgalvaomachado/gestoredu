<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
        <label class="title">Cadastro de Alune</label>
        <br>
        <label class="message_alert" id="messageAlert"></label>
        <br>
        <label>Nome</label>
        <br>
        <input class="input" name="nome" id="nome">
        <br>
        <label>Sala</label>
        <br>
        <select class='input' id="sala" name="sala"></select>
        <br>
        <input class='button' type="button" onclick="criarAlune()" value="Cadastrar">
        <script src="view/alune/index.js"></script>
        <script>buscarSalas()</script>
    </div>
</div>