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
		<label class="title">Editar Monitore</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<select class='input' id="monitore" name="monitore" onchange="buscarMonitore()">
			<option value="">Selecione o monitore</option>
		</select>
		</br>
		<div id="detalhes">
			<label>Nome</label>
			</br>
			<input class='input' name="nome" id="nome">
			</br>
			<label>Usuario</label>
			</br>
			<input class='input' name="usuario" id="usuario">
			</br>
			<label>Senha</label>
			</br>
			<input class='input' type="password" id="senha" name="senha">
			</br>
			<input class='button' type="button" onclick="editarMonitore()" value="Editar">
			<input class='button' type="button" onclick="excluirMonitore()" value="Excluir">
		</div>
		<script src="view/monitore/index.js"></script>
		<script>buscarMonitores()</script>
    </div>
</div>