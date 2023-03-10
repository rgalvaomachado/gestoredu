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
		<label class="title">Editar Sala</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<select class='input' id="sala" name="sala" onchange="buscarSala()">
			<option value="">Selecione a sala</option>
		</select>
		</br>
		<div id="detalhes">
			<label>Nome</label>
			</br>
			<input class='input' name="nome" id="nome">
			</br>
			<input class='button' type="button" onclick="editarSala()" value="Editar">
			<input class='button' type="button" onclick="excluirSala()" value="Excluir">
		</div>
		<script src="view/sala/index.js"></script>
		<script>buscarSalas()</script>
    </div>
</div>