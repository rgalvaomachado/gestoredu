<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
        <label class="title">Cadastro de Sala</label>
        <br>
        <label class="message_alert" id="messageAlert"></label>
        <br>
        <label>Nome</label>
        <br>
        <input class="input" name="nome" id="nome">
        <br>
        <input class='button' type="button" onclick="criarSala()" value="Cadastrar">
        <script src="view/sala/index.js"></script>
    </div>
</div>