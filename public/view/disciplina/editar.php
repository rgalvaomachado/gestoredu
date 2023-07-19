<?php 
    if (!isset($_GET['id'])){
        header("Location: /disciplina");
        die();
    }
?>
<head>
	<?php include_once('controller/DisciplinaController.php')?>
	<?php include_once('controller/UsuarioController.php')?>

    <link href="/public/view/disciplina/styles.css" rel="stylesheet">
    <script src="/public/view/disciplina/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once('public/top.php')?>
		<label class="title">Editar Disciplina</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$DisciplinaController = new DisciplinaController();
			$DisciplinaController = json_decode($DisciplinaController->buscar(['id' => $_GET['id']]));
			$disciplina = $DisciplinaController->disciplina;
		?>
		<form id="editar">
			<input type="hidden" id="disciplina" name="disciplina" value="<?php echo $disciplina->id?>">
			<label>Nome</label>
			</br>
			<input class='input' name="nome" id="nome" value="<?php echo $disciplina->nome?>">
			</br>
			</br>
			<label><b>Usuarios do Disciplina</b></label>
			<?php foreach($disciplina->usuarios as $usuarios) {?>
				<div id='listaUsurios'>
					<label><?php echo $usuarios->nome ?></label><br>
				</div>
			<?php } ?>
			<br>
			<input class='button editar' type="submit" value="Editar">
		</form>
    </div>
</div>