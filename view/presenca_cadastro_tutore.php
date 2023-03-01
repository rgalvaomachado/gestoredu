<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body style="background-color:white">
	<?php include_once 'top_bar.php'?>
	<?php include_once 'menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Presença Tutore</h1>
			<form action="controller/controller.php" method="post">
				<input type="hidden" name="metodo" value="criarPresencaTutore">	
				<div class="form-group">
					<?php
						include_once("../controller/sala.php");
						$SalaController = new SalaController();
						$salas = $SalaController->getSalas();
					?>
					<label>Salas</label>
					<?php $id = (isset($_GET['sala']) ? $_GET['sala'] : 1) ?>
					<select name="sala" class="form-control">
						<?php foreach($salas as $sala){ ?>
							<option value="<?= $sala['id'] ?>" <?= $sala['id'] == $id ? "selected" : ""?> > <?= $sala['nome'] ?></option>
						<?php } ?>
					</select>
					<br>
					<label>Data</label>
					<input name="data" class="form-control" type="date" required>
					<br>
					<label>Aula</label>
					<select name="aula" class="form-control">
						<option value="1">Primeira Aula</option>
						<option value="2">Segunda Aula</option>
					</select>
					<br>
					<label>Tutore</label>
					<?php
					include_once("../controller/tutore.php");
					$TutoreController = new TutoreController();
					$tutores = $TutoreController->getTutores();
					?>
					<?php $id = (isset($_GET['tutore']) ? $_GET['tutore'] : 1) ?>
					<select name="tutore" class="form-control">
						<?php foreach($tutores as $tutore){ ?>
							<option value="<?= $tutore['id'] ?>" <?= $tutore['id'] == $id ? "selected" : ""?> > <?= $tutore['nome'] ?></option>
						<?php } ?>
					</select>
					<br>
					<button type="submit" class="btn btn-md btn-warning">OK</button>
					<br>
					<br>
					<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
					<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'false' ? "Presença já registrada !" : "") ?></h4>
				</div>
			</form>
		</center>
	</div>
	<script src="public\js\jquery-1.11.1.min.js"></script>
	<script src="public\js\bootstrap.min.js"></script>
	<script src="public\js\login.js"></script></script>
</body>
</html>