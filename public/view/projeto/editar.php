<?php 
    if (!isset($_GET['id'])){
        header("Location: /projeto");
        die();
    }
?>
<head>
    <link href="/public/view/projeto/styles.css" rel="stylesheet">
    <script src="/public/view/projeto/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once('public/top.php')?>
		<label class="title">Editar Projeto</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$ProjetoController = new ProjetoController();
			$ProjetoController = json_decode($ProjetoController->buscar(['id' => $_GET['id']]));
			$projeto = $ProjetoController->projeto;
		?>
		<form id="editar">
			<input type="hidden" id="projeto" name="projeto" value="<?php echo $projeto->id?>">
			<label>Nome</label>
			</br>
			<input class='input' name="nome" id="nome" value="<?php echo $projeto->nome?>">
			<br>
			<input class='button editar' type="submit" value="Editar">
		</form>
    </div>
</div>