<head>
    <?php include_once('src/controller/GrupoController.php')?>
	<?php include_once('src/controller/SalaController.php')?>
	<?php include_once('src/controller/DisciplinaController.php')?>
    <link href="/public/view/presenca/styles.css" rel="stylesheet">
    <script src="/public/view/presenca/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once('public/top.php')?>
        <label class="title">Ponto Eletronico Professor</label>
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
        <input type="hidden" id="grupo" value="2">
        <br>
        <input class='button' type="button" onclick="criarPresencaMonitore()" value="Ok">
        <script src="view/presenca/index.js"></script>
        <script>
            buscarSalas();
            buscarMonitores();
        </script>
    </div>
</div>