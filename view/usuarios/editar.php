<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
	<?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
        <label class="title">Editar Usuarios</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<select class='input' id="representante" name="representante" onchange="buscarRepresentante()">
			<option value="">Selecione o representante</option>
		</select>
		</br>
		<div id="detalhes">
			<label>Nome</label>
			</br>
			<input class='input' id="nome" name="nome">
			</br>
			<label>Usuario</label>
			</br>
			<input class='input' id="usuario" name="usuario">
			</br>
			<label>Senha</label>
			</br>
			<input class='input' id="senha" type="password" name="senha">
			</br>
			<select class='input' id="representante" name="representante" onchange="buscarRepresentante()">
				<option value="">Selecione o representante</option>
			</select>
			</br>
			<label>Assinatura Atual</label>
			</br>
			<div id="assinaturaRepresentante" style="width: 300px;height: 150px;margin: auto;"></div>
			</br>
			<label>Nova Assinatura</label>
			</br>
			<input class='input' id="assinatura" name="assinatura" type="file">
			</br>
			<input class='button' type="button" onclick="editarRepresentante()" value="Editar">
			<input class='button' type="button" onclick="excluirRepresentante()" value="Excluir">
		</div>
		<script src="view/representante/index.js"></script>
		<script>buscarRepresentantes()</script>
    </div>
</div>