<head>
    <link href="/public/view/certificado/styles.css" rel="stylesheet">
    <script src="/public/view/certificado/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once('public/top.php')?>
		<label class="title">Certificado</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<form id="relatorioChamada">
            <label>Tipo</label>
			<br>
			<select class='input' id="grupo" name="grupo" required>
				<option value="">Selecione o tipo</option>
				<option value="1">Aluno</option>	
				<option value="2">Professor</option>	
			</select>
			<br>
			<label>Disciplina</label>
			<br>
			<?php 
				$DisciplinaController = new DisciplinaController();
				$disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
			?>
			<select class='input' id="disciplina" name="disciplina" required>
				<option value="">Selecione a Disciplina</option>
				<?php foreach ($disciplinas as $disciplina) { ?>
					<option value="<?php echo $disciplina->id ?>"><?php echo $disciplina->nome ?></option>	
				<?php } ?>
			</select>
			<br>
			<label>Sala</label>
			<br>
			<?php 
				$SalaController = new SalaController();
				$salas = json_decode($SalaController->buscarTodos())->salas;
			?>
			<select class='input' id="sala" name="sala" required>
				<option value="">Selecione a Sala</option>
				<?php foreach ($salas as $sala) { ?>
					<option value="<?php echo $sala->id ?>"><?php echo $sala->nome ?></option>	
				<?php } ?>
			</select>
			</br>
			<label>Data Inicial</label>
			<br>
			<input id="dataInicial" name="dataInicial" type="date" class="input" required>
			<br>
			<label>Data Final</label>
			<br>
			<input id="dataFinal" name="dataFinal" type="date" class="input" required>
			<br>
			<input class='button' type="submit" value="Buscar Alunos">
		</form>
		</br>
        <form id="gerarCertificado">
            <select class="input" id="usuario">
            </select>
            </br>
            <input class='button' type="submit" value="Gerar">
        </form>
        </br>
        <form id="baixarCertificado">
            <img id="certificado" src="storage\certificado.png">
            </br>
            </br>
            <input class='button' type="submit" value="Baixar">
        </form>
    </div>
</div>