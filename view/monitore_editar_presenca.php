<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body style="background-color:white">
	<?php include_once 'top_bar.php'?>
	<?php include_once 'menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Editar Presença Monitore</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
			<form action="controller/controller.php" method="post">
				<div class="form-group">
					<input type="hidden" name="metodo" value="buscarPresencaMonitore">
					<?php
						include_once("../controller/monitore.php");
						$MonitoreController = new MonitoreController();
						$monitores = $MonitoreController->getMonitores();
					?>
					<div class="form-group">
						</br>
						<label>Monitores</label>
						<?php $id = (isset($_GET['monitore']) ? $_GET['monitore'] : 1) ?>
						<select name="monitore" class="form-control">
							<?php foreach($monitores as $monitore){ ?>
								<option value="<?= $monitore['id'] ?>" <?= $monitore['id'] == $id ? "selected" : ""?> > <?= $monitore['nome'] ?></option>
							<?php } ?>
						</select>
					</div>
					<?php
						include_once("../controller/sala.php");
						$SalaController = new SalaController();
						$salas = $SalaController->getSalas();
					?>
					<div class="form-group">
						<label>Salas</label>
						<?php $id = (isset($_GET['sala']) ? $_GET['sala'] : 1) ?>
						<select name="sala" class="form-control">
							<?php foreach($salas as $sala){ ?>
								<option value="<?= $sala['id'] ?>" <?= $sala['id'] == $id ? "selected" : ""?> > <?= $sala['nome'] ?></option>
							<?php } ?>
						</select>
					</div>
					<label>Data</label>
					<?php $data = isset($_GET['data']) ? $_GET['data'] : ""?>
					<input name="data" class="form-control" type="date" value="<?= $data ?>" required>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<?php if(isset($_GET['monitore'])) { ?>
				<form action="controller/controller.php" method="post">
					<input type="hidden" name="metodo" value="editarPresencaMonitore">
					<input type="hidden" name="monitore" value="<?= $_GET['monitore'] ?>">
					<input type="hidden" name="sala" value="<?= $_GET['sala'] ?>">
					<input type="hidden" name="data" value="<?= $_GET['data'] ?>">
					<?php if($_GET['presente'] != "") { ?>
						<div class="row" >
							<div class="form-group">
								<br>
								<select name="presente" class="form-control">
									<option <?= $_GET['presente'] == "N" ? "selected" : ""?> value="N">Ausencia</option>
									<option <?= $_GET['presente'] == "S" ? "selected" : ""?> value="S">Presença</option>
								</select>
							</div>
							<button type="submit" class="btn btn-md btn-warning">Editar</button>
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