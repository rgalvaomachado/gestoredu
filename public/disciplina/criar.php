<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('../includes/menu.php')?>
    <form id="criar">
        <div class="grid-item-content">
            <?php include_once('../includes/top.php')?>
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