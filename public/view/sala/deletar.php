<?php 
    if (!isset($_GET['id'])){
        header("Location: /sala");
        die();
    }
?>
<head>
    <link href="/public/view/sala/styles.css" rel="stylesheet">
    <script src="/public/view/sala/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
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