<head>
	<?php include_once('src/controller/GrupoController.php')?>
	<?php include_once('src/controller/SalaController.php')?>
	<?php include_once('src/controller/DisciplinaController.php')?>
    <link href="/public/view/frequencia/styles.css" rel="stylesheet">
    <script src="/public/view/frequencia/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once('public/top.php')?>
		<label class="title">Frequência</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<form id="relatorioChamada">
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
			<label>Data Inicial</label>
			<br>
			<input id="dataInicial" name="dataInicial" type="date" class="input" required>
			<br>
			<label>Data Final</label>
			<br>
			<input id="dataFinal" name="dataFinal" type="date" class="input" required>
			<br>
			<input class='button' type="submit" value="Gerar">
		</form>
		</br>
		<div id="detalhes">
			<table>
				<thead>
					<tr>
						<th><strong>Nome</strong></th>
						<th><strong>Presença</strong></th>
						<th><strong>Ausencia</strong></th>
						<!-- <th><strong>Justificado</strong></th> -->
						<th><strong>Frequência</strong></th>
					</tr>
				</thead>
				<tbody id='lista'>
				</tbody>
			</table>
		</div>
    </div>
</div>