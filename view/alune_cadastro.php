<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body >
	<?php include_once 'top_bar.php'?>
	<?php include_once 'menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Cadastro de Alune</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
			<form action="controller/controller.php" method="post">
			<input type="hidden" name="metodo" value="criarAlune">	
				<div class="row">
					<div class="form-group">
						<label>Nome</label>
						<input name="nome" class="form-control" required>
					</div>
					<?php
						include_once("../controller/sala.php");
						$SalaController = new SalaController();
						$salas = $SalaController->getSalas();
					?>
					<div class="form-group">
						<label>Sala</label>
						<select name="sala" class="form-control">
							<?php foreach($salas as $sala){ ?>
								<option value="<?= $sala['id'] ?>"><?= $sala['nome'] ?></option>
							<?php } ?>
						</select>
					</div>
					<button type="submit" class="btn btn-md btn-warning">Cadastrar</button>
				</div>
			</form>
		</center>
	</div>
</body>
</html>