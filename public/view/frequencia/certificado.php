<?php 
	include_once($_SERVER['DOCUMENT_ROOT'].'/public/verifica_sessao.php');
    if (!isset($_GET['cod_usuario'])){
        header("Location: /frequencia");
        die();
    }
?>
<head>
    <link href="/public/view/frequencia/styles.css" rel="stylesheet">
    <script src="/public/view/frequencia/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
		<label class="title">Certificado</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<form>
			<?php
				$UsuarioController = new UsuarioController();
				$UsuarioController = json_decode($UsuarioController->buscar(['id' => $_GET['cod_usuario']]));
				$usuario = $UsuarioController->usuario;
			
				$gerarCertificado = new CertificadoController;
				$certificado = json_decode($gerarCertificado->gerarCertificado($_GET));
				if ($certificado->access) { ?>
					<img id="certificado" src="<?php echo $certificado->path?>">
					</br>
					</br>
					<a class="button" download="<?php echo $usuario->nome?>.png" href="<?php echo $_ENV['BASE_URL'] .'/tmp/'. $usuario->id?>.png">Baixar</a>
				<?php } else {
					echo $certificado->path;
				}
			?>
			
			
    </div>
</div>