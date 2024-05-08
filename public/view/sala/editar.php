<?php 
    if (!isset($_GET['id'])){
        header("Location: /sala");
        die();
    }
?>
<head>
	<?php include_once('src/controller/SalaController.php')?>
	<?php include_once('src/controller/UsuarioController.php')?>
    <link href="/public/view/sala/styles.css" rel="stylesheet">
    <script src="/public/view/sala/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once('public/top.php')?>
		<label class="title">Editar Sala</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$SalaController = new SalaController();
			$SalaController = json_decode($SalaController->buscar(['id' => $_GET['id']]));
			$sala = $SalaController->sala;
		?>
		<form id="editar">
			<input type="hidden" id="sala" name="sala" value="<?php echo $sala->id?>">
			<label>Nome</label>
			</br>
			<input class='input' name="nome" id="nome" value="<?php echo $sala->nome?>">
			</br>
			</br>
			<label><b>Usuarios do Sala</b></label>
			<?php foreach($sala->usuarios as $usuarios) {?>
				<div id='listaUsurios'>
					<label><?php echo $usuarios->nome ?></label><br>
				</div>
			<?php } ?>
			<br>
			<input class='button editar' type="submit" value="Editar">
		</form>
</div>