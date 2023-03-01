<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body style="background-color:white">
	<?php include_once 'top_bar.php'?>
	<?php include_once 'menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Cadastro de Tutore</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
		<form action="controller/controller.php" method="post">	
			<input type="hidden" name="metodo" value="criarTutore">
				<div class="row" >
					<div class="form-group">
						<label>Nome</label>
						<input name="nome" class="form-control" required>
					</div>
					<?php
						include_once("../controller/disciplina.php");
						$DisciplinaController = new DisciplinaController();
						$disciplinas = $DisciplinaController->getDisciplinas();
					?>
					<div class="form-group">
						<label>Disciplina</label>
						<select name="disciplina" class="form-control">
							<?php foreach($disciplinas as $disciplina){ ?>
								<option value="<?= $disciplina['id'] ?>"><?= $disciplina['nome'] ?></option>
							<?php } ?>
						</select>
					</div>
					<button type="submit" class="btn btn-md btn-warning">Cadastrar</button>
				</div>
			</form>
		</center>
	</div>
	<script src="public\js\jquery-1.11.1.min.js"></script>
	<script src="public\js\bootstrap.min.js"></script>
	<script src="public\js\login.js"></script></script>
</body>
</html>