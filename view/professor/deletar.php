<?php 
    if (!isset($_GET['id'])){
        header("Location: index.php");
        die();
    }
?>
<head>
    <?php include_once('../includes/head.html')?>
	<?php include_once('../../controller/DisciplinaController.php')?>
	<?php include_once('../../controller/UsuarioController.php')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<?php include_once('../includes/top.php')?>
		<label class="title">Deletar Professor(a)</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$UsuarioController = new UsuarioController();
			$UsuarioController = json_decode($UsuarioController->buscar(['id' => $_GET['id']]));
			$usuario = $UsuarioController->usuario;
		?>
		<form id="deletar">
			<input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario->id?>">
			<label>Nome</label>
			</br>
			<label><b><?php echo $usuario->nome?></b></label>
			</br>
			</br>
			<br>
			<input class='button deletar' type="submit" value="Deletar">
		</form>
    </div>
</div>