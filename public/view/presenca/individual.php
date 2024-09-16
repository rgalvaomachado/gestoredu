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
		<?php 
			$cod_grupo = isset($_GET['grupo']) ? $_GET['grupo'] : "";
			$cod_sala = isset($_GET['sala']) ? $_GET['sala'] : "";
			$cod_disciplina = isset($_GET['disciplina']) ? $_GET['disciplina'] : "";
		?>
		<form>
			<label>Tipo</label>
			<br>
			<select class='input' id="grupo" name="grupo" required>
				<option
					value="1"
					<?php echo ($cod_grupo == 1) ? "selected" : "" ?>
				>Aluno</option>	
				<option
					value="2"
					<?php echo ($cod_grupo == 2) ? "selected" : "" ?>
				>Professor</option>	
			</select>
			<br>
			<label>Sala</label>
			<br>
			<?php 
				$SalaController = new SalaController();
				$salas = json_decode($SalaController->buscarTodos())->salas;
			?>
			<select class='input' id="sala" name="sala" required>
				<option value="">Selecione uma sala</option>
				<?php foreach ($salas as $sala) { ?>
					<option 
						value="<?php echo $sala->id ?>"
						<?php echo ($cod_sala == $sala->id) ? "selected" : "" ?>
					><?php echo $sala->nome ?></option>	
				<?php } ?>
			</select>
			</br>
			<input class='button' type="submit" value="Buscar Disciplinas">
			</br>
			</br>
		</form>
		<?php if ($cod_sala) { ?>
			<form action="">
				<input hidden name="grupo" value="<?php echo $cod_grupo ?>">
				<input hidden name="sala" value="<?php echo $cod_sala ?>">
				<label>Disciplina</label>
				<br>
				<?php
					$SalaController = new SalaController();
					$SalaController = json_decode($SalaController->buscar(['id' => $_GET['sala']]));
					$sala = $SalaController->sala;
					$DisciplinaController = new DisciplinaController();
					$disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
				?>
				<select class='input' id="disciplina" name="disciplina" required>
					<option value="">Selecione uma disciplina</option>
					<?php foreach ($disciplinas as $disciplina) { 
						if (in_array($disciplina->id, $sala->disciplinas)) { ?>
							<option
								value="<?php echo $disciplina->id ?>"
								<?php echo ($cod_disciplina == $disciplina->id) ? "selected" : "" ?>
							><?php echo $disciplina->nome ?></option>	
						<?php }
					} ?>
				</select>
				<br>
				<input class='button' type="submit" value="Buscar">
				</br>
				</br>
			</form>
		<?php } ?>
		<?php if ($cod_disciplina) { ?>
			<form id="criarChamadaIndividual">
				<label>Data</label>
				<br>
				<input id="data" name="data" type="date" class="input" required>	
				<br>
				<?php
					$UsuarioController = new UsuarioController();
					$UsuarioController = json_decode($UsuarioController->buscarTodos(['grupo' => $cod_grupo, 'sala' => $cod_sala, 'disciplina' => $cod_disciplina]));
					$usuarios = $UsuarioController->usuarios;
				?>
				<select class="input" name="usuario" id="usuario">
					<?php foreach ($usuarios as $usuario) { ?>
						<option value="<?php echo $usuario->id ?>"><?php echo $usuario->nome ?></option>
					<?php } ?>
				</select>
				<br>
				<select class='input' id='presente' name="presente" required>
					<option value="S">Prenseça</option>
					<option value="N">Falta</option>
				</select>
				</br>
				<input class='button' type="submit" value="Fazer Chamada">
			</form>
		<?php } ?>
	</div>
</div>