<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body style="background-color:white">
	<?php include_once 'top_bar.php'?>
	<?php include_once 'menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Justificar Presença Reunião</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
			<form action="controller/controller.php" method="post">
				<div class="form-group">
					<input type="hidden" name="metodo" value="buscarPresencaReuniao">
					<?php
						include_once("../controller/tutore.php");
						$TutoreController = new TutoreController();
						$tutores = $TutoreController->getTutores();
					?>
					<div class="form-group">
						</br>
						<label>Tutores</label>
						<?php $id = (isset($_GET['tutore']) ? $_GET['tutore'] : 1) ?>
						<select name="tutore" class="form-control">
							<?php foreach($tutores as $tutore){ ?>
								<option value="<?= $tutore['id'] ?>" <?= $tutore['id'] == $id ? "selected" : ""?> > <?= $tutore['nome'] ?></option>
							<?php } ?>
						</select>
					</div>
					<label>Data</label>
					<?php $data = isset($_GET['data']) ? $_GET['data'] : ""?>
					<input name="data" class="form-control" type="date" value="<?= $data ?>" required>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<?php if(isset($_GET['tutore'])) { ?>
				<form action="controller/controller.php" method="post">
					<input type="hidden" name="metodo" value="justificarPresencaReuniao">
					<input type="hidden" name="tutore" value="<?= $_GET['tutore'] ?>">
					<input type="hidden" name="data" value="<?= $_GET['data'] ?>">
					<?php if($_GET['presente'] != "") { ?>
						<div class="row" >
							<div class="form-group">
								<br>
								<select name="presente" class="form-control">
									<option <?= $_GET['presente'] == "J" ? "selected" : ""?> value="J">Falta Justificada</option>
									<option <?= $_GET['presente'] == "N" ? "selected" : ""?> value="N">Falta</option>
									<option <?= $_GET['presente'] == "S" ? "selected" : ""?> value="S">Presença</option>
								</select>
							</div>
							<button type="submit" class="btn btn-md btn-warning">Justificar</button>
						</div>
					<?php } else { 
						echo "<br>";
						echo "Presença não encontrada";
					}?>
				</form>
			<?php } ?>
		</center>
	</div>
	<script src="public\js\jquery-1.11.1.min.js"></script>
	<script src="public\js\bootstrap.min.js"></script>
	<script src="public\js\login.js"></script></script>
</body>
</html>