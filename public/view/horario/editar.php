<?php 
    if (!isset($_GET['id'])){
        header("Location: /horario");
        die();
    }
?>
<head>
    <link href="/public/view/horario/styles.css" rel="stylesheet">
    <script src="/public/view/horario/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
		<label class="title">Editar Horario</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$HorarioController = new HorarioController();
			$HorarioController = json_decode($HorarioController->buscar(['id' => $_GET['id']]));
			$horario = $HorarioController->horario;
		?>
		<form id="editar">
			<input type="hidden" id="id" name="id" value="<?php echo $horario->id?>">
			<label>Professor</label>
			<br>
			<?php
                $UsuarioController = new UsuarioController();
                $usuarios = json_decode($UsuarioController->buscarPorGrupos([2]))->usuarios;
            ?>
			<select class='input' id="cod_usuario" name="cod_usuario" required>
				<?php foreach ($usuarios as $usuario) { ?>
					<option 
						value="<?php echo $usuario->id ?>" 
						<?php echo $horario->cod_usuario == $usuario->id ? "selected" : "" ?>
					>
						<?php echo $usuario->nome ?>
					</option>	
				<?php } ?>
			</select>
			<br>
            <label>Sala</label>
			<br>
            <?php
                $SalaControler = new SalaController();
                $salas = json_decode($SalaControler->buscarTodos())->salas;
            ?>
			<select class='input' id="cod_sala" name="cod_sala" required>
				<?php foreach ($salas as $sala) { ?>
					<option
						value="<?php echo $sala->id ?>"
						<?php echo $horario->cod_sala == $sala->id ? "selected" : "" ?>
					>
						<?php echo $sala->nome ?></option>	
				<?php } ?>
			</select>
			<br>
			<label>Disciplina</label>
			<br>
            <?php
                $DisciplinaController = new DisciplinaController();
                $disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
            ?>
			<select class='input' id="cod_disciplina" name="cod_disciplina" required>
				<?php foreach ($disciplinas as $disciplina) { ?>
					<option value="<?php echo $disciplina->id ?>"><?php echo $disciplina->nome ?></option>	
				<?php } ?>
			</select>
			<br>
            <label>Dia da Semana</label>
			<br>
            <select class='input' id="dia_semana" name="dia_semana" required>
				<option value="1" <?php echo $horario->dia_semana == 1 ? "selected" : "" ?>>Domingo</option>	
                <option value="2" <?php echo $horario->dia_semana == 2 ? "selected" : "" ?>>Segunda Feira</option>	
                <option value="3" <?php echo $horario->dia_semana == 3 ? "selected" : "" ?>>Terça Feira</option>	
                <option value="4" <?php echo $horario->dia_semana == 4 ? "selected" : "" ?>>Quarta Feira</option>	
                <option value="5" <?php echo $horario->dia_semana == 5 ? "selected" : "" ?>>Quinta Feira</option>	
                <option value="6" <?php echo $horario->dia_semana == 6 ? "selected" : "" ?>>Sexta Feira</option>	
                <option value="7" <?php echo $horario->dia_semana == 7 ? "selected" : "" ?>>Sábado</option>	
			</select>
			<br>
            <label>Hora Inicio</label>
			<br>
            <input class='input' id="hora_inicio" name="hora_inicio" type="time" value="<?php echo $horario->hora_inicio ?>" required>
            <br>
            <label>Hora Fim</label>
			<br>
            <input class='input' id="hora_fim" name="hora_fim" type="time" value="<?php echo $horario->hora_fim ?>" required>
            <br>
            <label>Cor</label>
			<br>
            <input class='input' id="cor" name="cor" type="color" value="<?php echo $horario->cor ?>"required>
            <br>
			<input class='button editar' type="submit" value="Editar">
		</form>
</div>