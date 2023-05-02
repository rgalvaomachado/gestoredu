<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Relatório</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<label>Salas</label>
		<br>
		<select class='input' id="sala" name="sala"></select>
		<br>
		<label>Data Inicial</label>
		<br>
		<input id="dataInicial" name="dataInicial" type="date" class="input">
		<br>
		<label>Data Final</label>
		<br>
		<input id="dataFinal" name="dataFinal" type="date" class="input">
		<br>
		<input class='button' type="button" onclick="relatorioPresencaAlune()" value="Gerar">
		<br>
		<div id="detalhes">
			<table>
				<thead>
					<tr>
						<th><strong>Nome</strong></th>
						<th><strong>Presença</strong></th>
						<th><strong>Ausencia</strong></th>
						<th><strong>Justificado</strong></th>
						<th><strong>Frequência</strong></th>
					</tr>
				</thead>
				<tbody id='lista'>
				</tbody>
			</table>
		</div>
		<script src="view/relatorio/index.js"></script>
		<script>buscarSalas()</script>
    </div>
</div>