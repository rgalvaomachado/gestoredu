<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
		<label class="title">Editar Grupo</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<select class='input' id="disciplina" name="disciplina" onchange="buscarDisciplina()">
			<option value="">Selecione a disciplina</option>
		</select>
		</br>
		<div id="detalhes">
			<label>Nome</label>
			</br>
			<input class='input' name="nome" id="nome">
			</br>
			<input class='button' type="button" onclick="editarDisciplina()" value="Editar">
			<input class='button' type="button" onclick="excluirDisciplina()" value="Excluir">
		</div>
		<script src="view/disciplina/index.js"></script>
		<script>buscarDisciplinas()</script>
    </div>
</div>