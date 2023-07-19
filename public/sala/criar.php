<head>
    <link href="/public/sala/styles.css" rel="stylesheet">
    <script src="/public/sala/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <form id="criar">
        <div class="grid-item-content">
            <?php include_once('public/top.php')?>
            <label class="title">Criar Sala</label>
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