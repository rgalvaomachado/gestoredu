<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.php')?>
<div class="grid-content grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Justificar Presença</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<label>Tutore</label>
		<br>
		<select class='input' id="tutore" name="tutore"></select>
		<br>
		<label>Data</label>
		<br>
		<input class='input' id="data" name="data" type="date">
		<br>
		<input class='button' type="button" onclick="buscarPresencaReuniao()" value="Buscar">
		<br>
		<div id="detalhes">
			<select class='input' name="presente" id="presente">
				<option value="N">Ausencia</option>
				<option value="S">Presença</option>
				<option value="J">Falta Justificada</option>
			</select>
			<br>
			<input class='button' type="button" onclick="justificarPresencaReuniao()" value="Justificar">
		</div>
		<script src="view/tutore/index.js"></script>
		<script>
			buscarTutores();
		</script>
    </div>
</div>