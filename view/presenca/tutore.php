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
		<label class="title">Presença Tutore</label>
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
		<label>Aula</label>
		<br>
		<select id="aula" name="aula" class="input">
			<option value="1">Primeira Aula</option>
			<option value="2">Segunda Aula</option>
		</select>
		<br>
		<label>Tutore</label>
		<br>
		<select class='input' id="tutore" name="tutore"></select>
		<br>
		<input class='button' type="button" onclick="criarPresencaTutore()" value="Ok">
		<script src="view/presenca/index.js"></script>
		<script>
			buscarSalas();
			buscarTutores();
		</script>
    </div>
</div>