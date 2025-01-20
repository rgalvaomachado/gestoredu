<?php 
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
			<label>Certificado</label>
			<br>
			<?php 
				$cod_certificado = isset($_GET['cod_certificado']) ? $_GET['cod_certificado'] : "";
				$cod_usuario = isset($_GET['cod_usuario']) ? $_GET['cod_usuario'] : "";
				$frequencia = isset($_GET['frequencia']) ? $_GET['frequencia'] : "";
				$cod_disciplina = isset($_GET['cod_disciplina']) ? $_GET['cod_disciplina'] : "";

				$CertificadoController = new CertificadoController();
				$certificados = json_decode($CertificadoController->buscarTodos())->certificados;
			?>
			<input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
			<input type="hidden" name="frequencia" value="<?php echo $frequencia?>">
			<input type="hidden" name="cod_disciplina" value="<?php echo $cod_disciplina?>">

			<select class='input' id="cod_certificado" name="cod_certificado" required>
				<option value="">Selecione um certificado</option>
				<?php foreach ($certificados as $certificado) { ?>
					<option 
						value="<?php echo $certificado->id ?>"
						<?php echo ($cod_certificado == $certificado->id) ? "selected" : "" ?>
					><?php echo $certificado->nome ?></option>	
				<?php } ?>
			</select>
			</br>
			<input class='button' type="submit" value="Gerar Certificado">
		</form>
		<br>
		<?php if ($cod_certificado) { ?>
			<?php
				$UsuarioController = new UsuarioController();
				$UsuarioController = json_decode($UsuarioController->buscar(['id' => $cod_usuario]));
				$usuario = $UsuarioController->usuario;
			
				$gerarCertificado = new CertificadoController;
				$certificado = $gerarCertificado->gerarCertificado([
					'cod_usuario' => $cod_usuario,
					'cod_certificado' => $cod_certificado,
					'disciplina' => $cod_disciplina,
					'frequencia' => $frequencia,
				]);
				$cert = json_decode($certificado);
			?>
			<img id="certificado" src="\<?php echo $cert->path?>">
			</br>
			</br>
			<a class="button" download="<?php echo $usuario->nome?>.png" href="<?php echo $_SERVER['SYSTEM_URL'] .'/tmp/'. $usuario->id?>.png">Baixar</a>
		<?php } ?>
    </div>
</div>