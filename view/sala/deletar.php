<?php 
    if (!isset($_GET['id'])){
        header("Location: index.php");
        die();
    }
?>
<head>
    <?php include_once('../includes/head.html')?>
	<?php include_once('../../controller/SalaController.php')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Deletar Sala</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$SalaController = new SalaController();
			$SalaController = json_decode($SalaController->buscar(['id' => $_GET['id']]));
			$sala = $SalaController->sala;
		?>
		<form id="deletar">
			<input type="hidden" id="sala" name="sala" value="<?php echo $sala->id?>">
			<label>Nome</label>
			</br>
			<label><b><?php echo $sala->nome?></b></label>
			</br>
			</br>
			<label><b>Usuarios da Sala</b></label>
			<?php foreach($sala->usuarios as $usuarios) {?>
				<div id='listaUsurios'>
					<label><?php echo $usuarios->nome ?></label><br>
				</div>
			<?php } ?>
			<br>
			<input class='button deletar' type="submit" value="Deletar">
		</form>
    </div>
</div>