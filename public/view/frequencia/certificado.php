<?php 
    if (!isset($_GET['id'])){
        header("Location: /frequencia");
        die();
    }
?>
<head>
	<?php include_once('src/controller/CertificadoController.php')?>
	<?php include_once('src/controller/UsuarioController.php')?>
	<?php include_once('src/controller/ProjetoController.php')?>
    <link href="/public/view/frequencia/styles.css" rel="stylesheet">
    <script src="/public/view/frequencia/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once('public/top.php')?>
		<label class="title">Certificado</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php
			$UsuarioController = new UsuarioController();
            $UsuarioController = json_decode($UsuarioController->buscar(['id' => $_GET['id']]));
            $usuario = $UsuarioController->usuario;

			$ProjetoController = new ProjetoController();
			$ProjetoController = json_decode($ProjetoController->buscarProjetoUsuario(['cod_usuario' => $_GET['id']]));
			$projeto_id = $ProjetoController->access ? $ProjetoController->projeto->id : '';
			$projeto_nome = $ProjetoController->access ? $ProjetoController->projeto->nome : '';

			$disciplina = $_GET['disciplina'] ? $_GET['disciplina'] : 0;

			$gerarCertificado = new CertificadoController;
			$certificado = $gerarCertificado->gerarCertificado([
				'id' => $usuario->id,
				'nome' => $usuario->nome,
				'disciplina' => $disciplina,
				'projeto' => $projeto_nome,
			]);
			$certificado = json_decode($certificado);
		?>
		<img id="certificado" src="\<?php echo $certificado->path?>">
		</br>
		</br>

		<a class="button" download="<?php echo $usuario->nome?>.png" href="<?php echo $_SERVER['SYSTEM_URL'] .'/tmp/'. $usuario->id?>.png">Baixar</a>
    </div>
</div>