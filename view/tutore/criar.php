<head>
    <script src="../public/js/jquery-1.11.1.min.js"></script>
    <script src="../public/js/md5.js"></script>
    <link href="../public/css/global.css" rel="stylesheet">

    <link href="../view/usuarios/styles.css" rel="stylesheet">
    <script src="../view/usuarios/index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
        <label class="title">Cadastro de Tutore</label>
        <br>
        <label class="message_alert" id="messageAlert"></label>
        <br>
        <label>Nome</label>
        <br>
        <input class="input" name="nome" id="nome">
        <br>
        <label>Disciplina</label>
        <br>
        <select class='input' id="disciplina" name="disciplina"></select>
        <br>
        <input class='button' type="button" onclick="criarTutore()" value="Cadastrar">
        <script src="view/tutore/index.js"></script>
        <script>buscarDisciplinas()</script>
    </div>
</div>