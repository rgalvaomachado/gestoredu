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
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once('public/top.php')?>
		<label class="title">Editar Certificado</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$CertificadoController = new CertificadoController();
			$CertificadoController = json_decode($CertificadoController->buscar(['id' => $_GET['id']]));
			$certificado = $CertificadoController->certificado;
		?>
		<form id="editar">
			<input type="hidden" id="id" name="id" value="<?php echo $certificado->id?>">
			<label>Nome</label>
			</br>
			<input class='input' name="nome" id="nome" value="<?php echo $certificado->nome?>">
			</br>
			<br>
			<label>Dicas: </label>
            <br>
			<?php include_once('public/view/certificado/dicas.php')?>
			<br>
            <label>Conteudo</label>
            <br>
			<textarea nome="conteudo" id="conteudo" class='input'><?php echo $certificado->conteudo?></textarea>
            <br>
			<label>Tamanho da Letra</label>
            <br>
            <input class='input' type="number" id="tamanho_letra" name="tamanho_letra" value="<?php echo $certificado->tamanho_letra?>" required>
            <br>
            <label>Imagem de fundo</label>
            <br>
			<label for="imagem"><img id="preview" class="img_certificado"></label>
			<br>
			<input type="file" class="input" id="imagem" name="imagem" accept="image/*" style="opacity: 0">
			<br>
			<script>
				const preloadedImage = "/storage/certificados/<?php echo $certificado->id?>.png"; // Substitua pelo caminho da sua imagem
				const preview = document.getElementById('preview');
				preview.src = preloadedImage;
				document.getElementById('imagem').addEventListener('change', function(event) {
					const file = event.target.files[0];
					if (file) {
						const reader = new FileReader();
						reader.onload = function(e) {
							preview.src = e.target.result;
						};
						reader.readAsDataURL(file);
					}
				});
			</script>
            <br>
			<input class='button editar' type="submit" value="Editar">
		</form>
</div>