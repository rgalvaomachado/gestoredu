<?php 
    if (!isset($_GET['id'])){
        header("Location: /aluno");
        die();
    }
?>
<head>
	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/src/controller/DisciplinaController.php')?>
	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/src/controller/UsuarioController.php')?>
    <link href="/public/view/aluno/styles.css" rel="stylesheet">
    <script src="/public/view/aluno/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
		<label class="title">Deletar Aluno(a)</label>
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