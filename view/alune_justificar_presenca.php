<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body style="background-color:white">
	<?php include_once 'top_bar.php'?>
	<?php include_once 'menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Justificar Presença Alune</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
			<form action="controller/controller.php" method="post">
				<input type="hidden" name="metodo" value="buscarSalaAluneJustifica">
				<?php
					include_once("../controller/sala.php");
					$SalaController = new SalaController();
					$salas = $SalaController->getSalas();
				?>
				<div class="form-group">
					<label>Salas</label>
					<?php $idSala = (isset($_GET['sala']) ? $_GET['sala'] : 1) ?>
					<select name="sala" class="form-control">
						<?php foreach($salas as $sala){ ?>
							<option value="<?= $sala['id'] ?>" <?= $sala['id'] == $idSala ? "selected" : ""?> > <?= $sala['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<?php if(isset($_GET['sala'])) { ?>
				<form action="controller/controller.php" method="post">
					<div class="form-group">
						<input type="hidden" name="metodo" value="buscarPresencaAlune">
						<input type="hidden" name="sala" value="<?= $idSala ?>">
						<?php
							include_once("../controller/alune.php");
							$AluneController = new AluneController();
							$alunes = $AluneController->getAlunesSala($_GET['sala']);
						?>
						<div class="form-group">
							</br>
							<label>Alunes</label>
							<?php $id = (isset($_GET['alune']) ? $_GET['alune'] : 1) ?>
							<select name="alune" class="form-control">
								<?php foreach($alunes as $alune){ ?>
									<option value="<?= $alune['id'] ?>" <?= $alune['id'] == $id ? "selected" : ""?> > <?= $alune['nome'] ?></option>
								<?php } ?>
							</select>
						</div>
						<label>Data</label>
						<?php $data = isset($_GET['data']) ? $_GET['data'] : ""?>
						<input name="data" class="form-control" type="date" value="<?= $data ?>" required>
						<label>Aula</label>
						<?php $aula = isset($_GET['aula']) ? $_GET['aula'] : '1'?>
						<select name="aula" class="form-control">
							<option <?= $aula == "1" ? "selected" : ""?> value="1">Primeira Aula</option>
							<option <?= $aula == "2" ? "selected" : ""?> value="2">Segunda Aula</option>
						</select>

					</div>
					<button type="submit" class="btn btn-md btn-warning">Buscar</button>
				</form>
			<?php } ?>
			<?php if(isset($_GET['alune'])) { ?>
				<form action="controller/controller.php" method="post">
					<input type="hidden" name="metodo" value="justificarPresencaAlune">
					<input type="hidden" name="alune" value="<?= $_GET['alune'] ?>">
					<input type="hidden" name="sala" value="<?= $_GET['sala'] ?>">
					<input type="hidden" name="data" value="<?= $_GET['data'] ?>">
					<input type="hidden" name="aula" value="<?= $_GET['aula'] ?>">
					<input type="hidden" name="presente" value="<?= $_GET['presente'] ?>">
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