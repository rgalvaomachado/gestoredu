<?php 
	include_once($_SERVER['DOCUMENT_ROOT'].'/public/verifica_sessao.php');
    if (!isset($_GET['id'])){
        header("Location: /horario");
        die();
    }
?>
<head>
    <link href="/public/view/horario/styles.css" rel="stylesheet">
    <script src="/public/view/horario/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
		<label class="title">Deletar Horario</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$HorarioController = new HorarioController();
			$HorarioController = json_decode($HorarioController->buscar(['id' => $_GET['id']]));
			$horario = $HorarioController->horario;
		?>
		<form id="deletar">
			<input type="hidden" id="id" name="id" value="<?php echo $horario->id?>">
			<label>Professor: </label>
			<label><b><?php echo $horario->usuario_nome?></b></label>
			<br>
			<label>Sala: </label>
			<label><b><?php echo $horario->sala_nome?></b></label>
			<br>
			<label>Hora Inicio: </label>
			<label><b><?php echo $horario->hora_inicio?></b></label>
			<br>
			<label>Hora Fim: </label>
			<label><b><?php echo $horario->hora_fim?></b></label>
			<br>
			<br>
			<input class='button deletar' type="submit" value="Deletar">
		</form>
    </div>
</div>