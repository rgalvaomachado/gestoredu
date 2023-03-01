<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body style="background-color:white">
	<?php include_once 'top_bar.php'?>
	<?php include_once 'menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Presença Alune</h1>
			<form action="controller/controller.php" method="post">
				<input type="hidden" name="metodo" value="buscarSalaAlune">	
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
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'false' ? "Presença já registrada !" : "") ?></h4>
			<?php if(isset($_GET['sala'])){ ?>
				<form action="controller/controller.php" method="post">
					<input type="hidden" name="metodo" value="criarPresencaAlune">	
					<input type="hidden" name="sala" value="<?= $_GET['sala'] ?>">	
					<div class="row" >
						<div class="form-group">
							<label>Data</label>
							<input name="data" class="form-control" type="date" required>
							<label>Aula</label>
							<select name="aula" class="form-control">
								<option value="1">Primeira Aula</option>
								<option value="2">Segunda Aula</option>
							</select>
							</br>
							<?php
								include_once("../controller/alune.php");
								$AluneController = new AluneController();
								$alunes = $AluneController->getAlunesSala($_GET['sala']);
							?>
							<label>Alunes</label>
							<table class="table" style="text-align:center">
							<thead>
								<tr>
									<td scope="col"><strong>Nome</strong></td>
									<td scope="col"><strong>Presente</strong></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($alunes as $alune){ ?>
									<tr>
										<td><?= $alune['nome'] ?></td>
										<td><input name="presente[]" type="checkbox" value='<?= $alune['id'] ?>'></td>
									</tr>
								<?php } ?>
							</tbody>
							</table>
						</div>
						<button type="submit" class="btn btn-md btn-warning">OK</button>
					</div>
				</form>
			<?php } ?>
		</center>
	</div>
	<script src="public\js\jquery-1.11.1.min.js"></script>
	<script src="public\js\bootstrap.min.js"></script>
	<script src="public\js\login.js"></script></script>
</body>
</html>