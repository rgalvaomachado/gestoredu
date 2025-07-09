<head>
    <link href="/public/view/presenca/styles.css" rel="stylesheet">
    <script src="/public/view/presenca/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
		<label class="title">Presença Listada</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<label>Tipo</label>
		<br>
		<select class='input' id="grupo" name="grupo" required>
			<option value="1">Aluno</option>	
			<option value="2">Professor</option>	
		</select>
		<br>
		<?php 
			$SalaController = new SalaController();
			$salas = json_decode($SalaController->buscarTodos())->salas;
		?>
		<label>Sala</label>
		<br>
		<select class='input coluna' id="sala" name="sala" onchange="getDisciplinas()">
			<option value="">Selecione uma sala</option>
			<?php foreach ($salas as $sala) { ?>
				<option value="<?php echo $sala->id ?>"><?php echo $sala->nome ?></option>	
			<?php } ?>
		</select>
		<br>
		<label>Disciplina</label>
		<br>
		<select class='input coluna' id="disciplina" name="disciplina" onchange="getInscricoesListada()">
			<option value="">Selecione uma disciplina</option>
				</select>
				</select>
		</select>
		<br>
		<form id="criarChamadaListada">
			<label>Data</label>
			<br>
			<input id="data" name="data" type="date" class="input" required>	
			<br>
			<label>Presença</label>
			<br>
			<table id='lista'>
				<thead>
					<tr>
						<th><strong>Nome</strong></th>
						<th><strong>Presente</strong></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			</br>
			<input class='button' type="submit" value="Fazer Chamada">
		</form>
	</div>
</div>