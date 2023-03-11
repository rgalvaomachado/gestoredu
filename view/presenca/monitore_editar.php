<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Editar Presença Monitore</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<label>Monitores</label>
		<br>
		<select class='input' id="monitore" name="monitore"></select>
		<br>
		<label>Salas</label>
		<br>
		<select class='input' id="sala" name="sala"></select>
		<br>
		<label>Data</label>
		<br>
		<input class='input' id="data" name="data" type="date">
		<br>
		<input class='button' type="button" onclick="buscarPresencaMonitore()" value="Buscar">
		<br>
		<div id="detalhes">
			<select class='input' name="presente" id="presente">
				<option value="N">Ausencia</option>
				<option value="S">Presença</option>
			</select>
			<br>
			<input class='button' type="button" onclick="editarPresencaMonitore()" value="Editar">
		</div>
		<script src="view/monitore/index.js"></script>
		<script>
			buscarMonitores();
			buscarSalas();
		</script>
    </div>
</div>