<head>
    <?php include_once('../includes/head.html')?>
	<?php include_once('../../controller/GrupoController.php')?>
	<?php include_once('../../controller/UsuarioController.php')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.php')?>
<div class="grid-content grid-container">
    <?php include_once('../includes/menu.php')?>
    <div class="grid-item-content">
		<label class="title">Editar Grupo</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$GrupoController = new GrupoController();
			$grupos = json_decode($GrupoController->buscarTodos())->grupos;
		?>
		<select class='input' id="grupo" name="grupo" onchange="buscarGrupo()">
			<option value="">Selecione o Grupo</option>
			<?php foreach ($grupos as $grupo) { ?>
				<option value="<?php echo $grupo->id ?>"><?php echo $grupo->nome ?></option>	
			<?php } ?>
		</select>
		</br>
		<div id="detalhes">
			<form id="editar">
				<div class="grid-item-content">
				<label>Nome</label>
			</br>
			<input class='input' name="nome" id="nome">
			</br>
			</br>
			<label><b>Usuarios do Grupo</b></label>
			<div id='listaUsurios'></div>
					<br>
					<input class='button editar' type="submit" value="Editar">
				</div>
			</form>
			<form id="deletar">
				<input class='button deletar' type="submit" value="Deletar">
			</form>
		</div>
    </div>
</div>