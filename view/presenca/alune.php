<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Presença Alune</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<label>Salas</label>
		<br>
		<select class='input' id="sala" name="sala" onchange="buscarAlunesLista()">
			<option value="">Selecione a sala</option>
		</select>
		<div id='detalhes'>
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
			<br>
			<label><strong>Alunes</strong></label>
			<br>
			<table>
				<thead>
					<tr>
						<th><strong>Nome</strong></th>
						<th><strong>Presente</strong></th>
					</tr>
				</thead>
				<tbody id='lista'>
				</tbody>
			</table>
			<input class='button' type="button" onclick="criarPresencaAlune()" value="Ok">
		</div>
		<script src="view/presenca/index.js"></script>
		<script>buscarSalas()</script>
    </div>
</div>