<head>
    <?php include_once('../includes/head.html')?>
	<?php include_once('../../controller/DisciplinaController.php')?>
	<?php include_once('../../controller/UsuarioController.php')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Editar Disciplina</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$DisciplinaController = new DisciplinaController();
			$disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
		?>
		<select class='input' id="disciplina" name="disciplina" onchange="buscarDisciplina()">
			<option value="">Selecione o Disciplina</option>
			<?php foreach ($disciplinas as $disciplina) { ?>
				<option value="<?php echo $disciplina->id ?>"><?php echo $disciplina->nome ?></option>	
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
			<label><b>Usuarios do Disciplina</b></label>
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