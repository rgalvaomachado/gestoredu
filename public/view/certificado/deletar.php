<?php 
    if (!isset($_GET['id'])){
        header("Location: /certificado");
        die();
    }
?>
<head>
    <link href="/public/view/certificado/styles.css" rel="stylesheet">
    <script src="/public/view/certificado/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
		<label class="title">Deletar Certificado</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$CertificadoController = new CertificadoController();
			$CertificadoController = json_decode($CertificadoController->buscar(['id' => $_GET['id']]));
			$certificado = $CertificadoController->certificado;
			// var_dump($certificado);
		?>
		<form id="deletar">
			<input type="hidden" id="id" name="id" value="<?php echo $certificado->id?>">
			<label>Sala</label>
			</br>
			<label><b><?php echo $certificado->nome_sala?></b></label>
			</br>
			<label>Disciplina</label>
			</br>
			<label><b><?php echo $certificado->nome_disciplina?></b></label>
			<br>
			<br>
			<input class='button deletar' type="submit" value="Deletar">
		</form>
    </div>
</div>