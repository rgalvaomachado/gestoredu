<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-content grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Editar Presença</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<label>Grupo</label>
		<br>
		<select class='input' id="tutore" name="tutore"></select>
		<br>
		<label>Usuario</label>
		<br>
		<select class='input' id="sala" name="sala"></select>
		<br>
		<label>Data</label>
		<br>
		<input class='input' id="data" name="data" type="date">
		<br>
		<input class='button' type="button" onclick="buscarPresencaTutore()" value="Buscar">
		<br>
		<div id="detalhes">
			<select class='input' name="presente" id="presente">
				<option value="N">Ausencia</option>
				<option value="S">Presença</option>
			</select>
			<br>
			<input class='button' type="button" onclick="editarPresencaTutore()" value="Editar">
		</div>
		<script src="view/tutore/index.js"></script>
		<script>
			buscarTutores();
			buscarSalas();
		</script>
    </div>
</div>