<head>
    <?php include_once('../includes/head.html')?>
	<?php include_once('../../controller/GrupoController.php')?>
	<?php include_once('../../controller/UsuarioController.php')?>

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
		<?php
			$UsuarioController = new UsuarioController();
			$usuarios = json_decode($UsuarioController->buscarTodos())->usuarios;
		?>
		<select class='input' id="usuario" name="usuario" onchange="buscarUsuario()">
			<option value="">Selecione o Usuario</option>
			<?php foreach ($usuarios as $usuario) { ?>
				<option value="<?php echo $usuario->id ?>"><?php echo $usuario->nome ?></option>
			<?php } ?>
		</select>
		</br>
		<div id="detalhes">
			<form id="editar">
				<div class="grid-item-content">
					<label>Nome Completo</label>
					<br>
					<input class='input' id="nome" name="nome" required>
					<br>
					<label>CPF</label>
					<br>
					<input class='input' id="cpf" name="cpf">
					<br>
					<br>
					<label>Endereço</label>
					<br>
					<br>
					<div class="grid-endereco">
						<div class="grid-endereco-item">
							<label>Rua</label>
							<br>
							<input class='input' id="endereco" name="endereco">
						</div>
						<div class="grid-endereco-item">
							<label>Numero</label>
							<br>
							<input type="number" min='0' class='input' id="endereco" name="endereco">
						</div>
						<div class="grid-endereco-item">
							<label>Bairro</label>
							<br>
							<input class='input' id="endereco" name="endereco">
						</div>
					</div>
					<br>
					<div class="grid-cep">
						<div class="grid-endereco-item">
							<label>Cidade</label>
							<br>
							<input class='input' id="endereco" name="endereco">
						</div>
						<div class="grid-endereco-item">
							<label>Estado</label>
							<br>
							<select class='input'>
								<option>
									SP
								</option>
							</select>
						</div>
						<div class="grid-endereco-item">
							<label>Pais</label>
							<br>
							<select class='input'>
								<option>
									BR
								</option>
							</select>
						</div>
					</div>
					<br>
					<label>Email</label>
					<br>
					<input class='input' type= "email" id="email" name="email" required>
					<br>
					<label>Senha</label>
					<br>
					<input class='input' id="senha" name="senha" type="password" required>
					<br>
					<label>Grupos</label>
					<br>
					<?php
						$GrupoController = new GrupoController();
						$grupos = json_decode($GrupoController->buscarTodos())->grupos;
					?>
					<div id='gruposTodos'>
						<?php foreach ($grupos as $grupo) { ?>
							<input type='checkbox' id="grupos" name="grupos[]" value="<?php echo $grupo->id ?>"><?php echo $grupo->nome ?>
						<?php } ?>
					</div>
					<br>
					<input class='button editar' type="submit" value="Editar">
				</div>
			</form>
			<form id="deletar">
				<input class='button deletar' type="submit" value="Deletar">
			</form>
		</div>
    </div>
</div>