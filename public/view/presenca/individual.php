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
		<label class="title">Presença Individual</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<form id="buscarIndividual">
			<label>Tipo</label>
			<br>
			<select class='input' id="grupo" name="grupo" required>
				<option value="">Selecione o tipo</option>
				<option value="1">Aluno</option>	
				<option value="2">Professor</option>	
			</select>
			<br>
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
			<form id="criarChamadaIndividual">
				<label>Data</label>
				</br>
				<input id="data" name="data" type="date" class="input" required>
				<br>
				<select class='input' id='usuario' name="usuario" required>
				</select>
				</br>
				<select class='input' id='presente' name="presente" required>
					<option value="S">Prenseça</option>
					<option value="N">Falta</option>
				</select>
				</br>
				<input class='button' type="submit" value="Fazer Chamada">
			</form>
		</div>
    </div>
</div>