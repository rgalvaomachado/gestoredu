<?php 
    if (!isset($_GET['id'])){
        header("Location: index.php");
        die();
    }
?>
<head>
    <?php include_once('../includes/head.html')?>
	<?php include_once('../../controller/DisciplinaController.php')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<?php include_once('../includes/top.html')?>
		<label class="title">Deletar Disciplina</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$DisciplinaController = new DisciplinaController();
			$DisciplinaController = json_decode($DisciplinaController->buscar(['id' => $_GET['id']]));
			$disciplina = $DisciplinaController->disciplina;
		?>
		<form id="deletar">
			<input type="hidden" id="disciplina" name="disciplina" value="<?php echo $disciplina->id?>">
			<label>Nome</label>
			</br>
			<label><b><?php echo $disciplina->nome?></b></label>
			</br>
			</br>
			<label><b>Usuarios do Disciplina</b></label>
			<?php foreach($disciplina->usuarios as $usuarios) {?>
				<div id='listaUsurios'>
					<label><?php echo $usuarios->nome ?></label><br>
				</div>
			<?php } ?>
			<br>
			<input class='button deletar' type="submit" value="Deletar">
		</form>
    </div>
</div>