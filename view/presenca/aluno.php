<head>
    <?php include_once('../includes/head.html')?>
	<?php include_once('../../controller/GrupoController.php')?>
	<?php include_once('../../controller/SalaController.php')?>
	<?php include_once('../../controller/DisciplinaController.php')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Chamada Aluno</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<form id="buscar">
			<input type="hidden" id="grupo" value="1">
			<label>Disciplina</label>
			<br>
			<?php 
				$DisciplinaController = new DisciplinaController();
				$disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
			?>
			<select class='input' id="disciplina" name="disciplina" required>
				<option value="">Selecione a Disciplina</option>
				<?php foreach ($disciplinas as $disciplina) { ?>
					<option value="<?php echo $disciplina->id ?>"><?php echo $disciplina->nome ?></option>	
				<?php } ?>
			</select>
			<br>
			<label>Sala</label>
			<br>
			<?php 
				$SalaController = new SalaController();
				$salas = json_decode($SalaController->buscarTodos())->salas;
			?>
			<select class='input' id="sala" name="sala" required>
				<option value="">Selecione a Sala</option>
				<?php foreach ($salas as $sala) { ?>
					<option value="<?php echo $sala->id ?>"><?php echo $sala->nome ?></option>	
				<?php } ?>
			</select>
			</br>
			<input class='button' type="submit" value="Buscar">
		</form>
		<br>
		<br>
		<div id="detalhes">
			<form id="criarChamada">
				<label>Data</label>
				<br>
				<input id="data" name="data" type="date" class="input" required>
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
				<input class='button' type="submit" value="Fazer Chamada">
			</form>
		</div>
    </div>
</div>