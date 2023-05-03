<head>
    <?php include_once('../includes/head.html')?>
	<?php include_once('../../controller/SalaController.php')?>
	<?php include_once('../../controller/UsuarioController.php')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Editar Sala</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$SalaController = new SalaController();
			$salas = json_decode($SalaController->buscarTodos())->salas;
		?>
		<select class='input' id="sala" name="sala" onchange="buscarSala()">
			<option value="">Selecione o Sala</option>
			<?php foreach ($salas as $sala) { ?>
				<option value="<?php echo $sala->id ?>"><?php echo $sala->nome ?></option>	
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
			<label><b>Usuarios do Sala</b></label>
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