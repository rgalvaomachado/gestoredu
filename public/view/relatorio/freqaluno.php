<head>
	<?php include_once('controller/GrupoController.php')?>
	<?php include_once('controller/SalaController.php')?>
	<?php include_once('controller/DisciplinaController.php')?>
    <link href="/public/view/relatorio/styles.css" rel="stylesheet">
    <script src="/public/view/relatorio/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once('public/top.php')?>
		<label class="title">Frequência de Alunos</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<form id="relatorioChamada">
			<input type="hidden" id="grupos" value="1">
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