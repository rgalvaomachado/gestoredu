<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body style="background-color:white">
	<?php include_once 'top_bar.php'?>
	<?php include_once 'menu.php'?>	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Relatório Monitore</h1>
			<form action="controller/controller.php" method="post">
				<input type="hidden" name="metodo" value="relatorioPresencaMonitore">
				<?php
					include_once("../controller/sala.php");
					$SalaController = new SalaController();
					$salas = $SalaController->getSalas();
				?>
				<div class="form-group">
					<label>Salas</label>
					<?php $id = (isset($_GET['cod_sala']) ? $_GET['cod_sala'] : 1) ?>
					<select name="cod_sala" class="form-control">
						<?php foreach($salas as $sala){ ?>
							<option value="<?= $sala['id'] ?>" <?= $sala['id'] == $id ? "selected" : ""?> > <?= $sala['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<label>Data Inicial</label>
				<?php $data_inicial = isset($_GET['data_inicial']) ? $_GET['data_inicial'] : ""?>
				<input name="data_inicial" class="form-control" type="date" value="<?= $data_inicial ?>" required>
				<br>
				<label>Data Final</label>
				<?php $data_final = isset($_GET['data_final']) ? $_GET['data_final'] : ""?>
				<input name="data_final" class="form-control" type="date" value="<?= $data_final ?>" required>
				<br>
				<button type="submit" class="btn btn-md btn-warning">Gerar</button>
			</form>
            <?php if(isset($_GET['cod_sala'])){ ?>
				<?php
					include_once("../controller/monitore.php");
					$MonitoreController = new MonitoreController();
					$monitores = $MonitoreController->getMonitores();
				?>
				<table style="width:70%; text-align: center;">
					<tr>
						<td><b>Nome</b></td>
						<td><b>Presença</b></td>
					</tr>
					<?php
					foreach($monitores as $monitore){
						include_once("../controller/presenca.php");
						$PresencaController = new PresencaController();
						$presencas = $PresencaController->getPresencaPeriodo(
							$_GET['cod_sala'],
							0,
							$monitore['id'],	
							0,
							$_GET['data_inicial'],
							$_GET['data_final']
						);
						$presencas = count($presencas);
						?>		
						<tr style= "display: <?= ($presencas < 1 ? "none" : "") ?>; border-bottom: 1px solid #555;">
							<td><?= $monitore['nome']?></td>
							<td><?= $presencas?></td>
						</tr>
					<?php } ?>
           		</table>
				<br>
			<?php } ?>
		</center>
	</div>
	<script src="public\js\jquery-1.11.1.min.js"></script>
	<script src="public\js\bootstrap.min.js"></script>
	<script src="public\js\login.js"></script></script>
</body>
</html>