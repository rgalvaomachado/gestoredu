<head>
    <script src="../public/js/jquery-1.11.1.min.js"></script>
    <script src="../public/js/md5.js"></script>
    <link href="../public/css/global.css" rel="stylesheet">

    <link href="../view/usuarios/styles.css" rel="stylesheet">
    <script src="../view/usuarios/index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Editar Alune</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<select class='input' id="alune" name="alune" onchange="buscarAlune()">
			<option value="">Selecione o alune</option>
		</select>
		</br>
		<div id="detalhes">
			<label>Nome</label>
			<br>
			<input class="input" name="nome" id="nome">
			<br>
			<label>Sala</label>
			<br>
			<select class='input' id="sala" name="sala"></select>
			<br>
			<input class='button' type="button" onclick="editarAlune()" value="Editar">
			<input class='button' type="button" onclick="excluirAlune()" value="Excluir">
		</div>
		<script src="view/alune/index.js"></script>
		<script>
			buscarAlunes();
			buscarSalas();
		</script>
    </div>
</div>