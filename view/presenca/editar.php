<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Editar Presença</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<label>Tutores</label>
		<br>
		<select class='input' id="tutore" name="tutore"></select>
		<br>
		<label>Salas</label>
		<br>
		<select class='input' id="sala" name="sala"></select>
		<br>
		<label>Aula</label>
		<br>
		<select class='input' id="aula" name="aula">
			<option value="1">Primeira Aula</option>
			<option value="2">Segunda Aula</option>
		</select>
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