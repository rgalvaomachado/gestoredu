<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AtenaSystem</title>
	<link href="public/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/css/font-awesome.min.css" rel="stylesheet">
	<link href="public/css/datepicker3.css" rel="stylesheet">
	<link href="public/css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="icon" href="public/img/hubis-icon.png">
</head>
<body>
	<center>
		<div class="panel-login">
			<h3>Login</h3>
			<input type="hidden" id="metodo" name="metodo" value="login">
			<div class="form-group">
				<input class="form-control" placeholder="Usuario" id="usuario" name="usuario" type="text" autofocus="">
			</div>
			<div class="form-group">
				<input class="form-control" placeholder="Senha" id="senha" name="senha" type="password" value="">
			</div>
			<div class="form-group">
				<button type="button" class="btn btn-md btn-warning" onclick="login()">Entrar</button>
			</div>
			<?php if (isset($_GET['error'])) {?>
				<h5>Login ou senha incorreto</h5>
			<?php } ?>
		</div>
	</center>
	<script src="public\js\jquery-1.11.1.min.js"></script>
	<script src="public\js\bootstrap.min.js"></script>
	<script src="public/js/md5.js"></script>
	<script src="public/js/login.js"></script>
</body>
</html>
