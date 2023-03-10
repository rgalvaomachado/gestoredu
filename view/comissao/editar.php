<head>
    <script src="../public/js/jquery-1.11.1.min.js"></script>
    <script src="../public/js/md5.js"></script>
    <link href="../public/css/global.css" rel="stylesheet">

    <link href="../view/comissao/styles.css" rel="stylesheet">
    <script src="../view/comissao/index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Editar Comissão</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<select class='input' id="comissao" name="comissao" onchange="buscarComissao()">
			<option value="">Selecione a comissao</option>
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
			<input class='button' type="button" onclick="editarComissao()" value="Editar">
			<input class='button' type="button" onclick="excluirComissao()" value="Excluir">
		</div>
		<script src="view/comissao/index.js"></script>
		<script>buscarComissoes();</script>
    </div>
</div>