<head>
    <link href="/public/view/certificado/styles.css" rel="stylesheet">
    <script src="/public/view/certificado/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <form id="criar">
        <div class="grid-item-content">
            <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
            <label class="title">Criar Certificado</label>
            <br>
            <label class="message_alert" id="messageAlert"></label>
            <br>
            <label>Nome</label>
            <br>
            <input class='input' id="nome" name="nome" required>
            <br>
			<label>Dicas: </label>
            <br>
			<?php include_once('public/view/certificado/dicas.php')?>
			<br>
            <label>Conteudo</label>
            <br>
            <textarea class='input textarea' id="conteudo" name="conteudo"></textarea>
            <br>
            <label>Tamanho da Letra</label>
            <br>
            <input class='input' type="number" id="tamanho_letra" name="tamanho_letra" required>
            <br>
            <label>Imagem de fundo</label>
            <br>
			<label for="imagem"><img id="preview" class="img_certificado"></label>
            <br>
			<input type="file" class="input" id="imagem" name="imagem" required accept="image/*" style="opacity: 0">
			<br>
			<script>
				const preloadedImage = "/storage/certificados/padrao.png"; // Substitua pelo caminho da sua imagem
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
            <br>
            <input class='button' type="submit" value="Criar">
        </div>
    </form>
</div>