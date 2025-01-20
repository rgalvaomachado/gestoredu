<head>
    <link href="/public/view/disciplina/styles.css" rel="stylesheet">
    <script src="/public/view/disciplina/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <form id="criar">
        <div class="grid-item-content">
            <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
            <label class="title">Criar Disciplina</label>
            <br>
            <label class="message_alert" id="messageAlert"></label>
            <br>
            <label>Nome</label>
            <br>
            <input class='input' id="nome" name="nome" required>
            <br>
            <br>
            <input class='button' type="submit" value="Criar">
        </div>
    </form>
</div>