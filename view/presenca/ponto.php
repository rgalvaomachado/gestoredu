<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.php')?>
<div class="grid-content grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
        <label class="title">Ponto Eletronico</label>
        <br>
        <label class="message_alert" id="messageAlert"></label>
        <br>
        <label>Salas</label>
        <br>
        <select class='input' id="sala" name="sala"></select>
        <br>
        <label>Data</label>
        <br>
        <input id="data" name="data" type="date" class="input">
        <br>
        <label>Monitores</label>
        <br>
        <select class='input' id="monitore" name="monitore"></select>
        <br>
        <input class='button' type="button" onclick="criarPresencaMonitore()" value="Ok">
        <script src="view/presenca/index.js"></script>
        <script>
            buscarSalas();
            buscarMonitores();
        </script>
    </div>
</div>