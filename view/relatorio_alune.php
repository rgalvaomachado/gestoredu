<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body style="background-color:white">
	<?php include_once 'top_bar.php'?>
	<?php include_once 'menu.php'?>	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Relatório Alune</h1>
			<form action="controller/controller.php" method="post">
				<input type="hidden" name="metodo" value="relatorioPresencaAlune">
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
					include_once("../controller/alune.php");
					$AluneController = new AluneController();
					$alunes = $AluneController->getAlunesSala($_GET['cod_sala']);
				?>
				<table style="width:70%; text-align: center;">
					<tr>
						<td><b>Nome</b></td>
						<td><b>Presença</b></td>
						<td><b>Ausencia</b></td>
						<td><b>Justificado</b></td>
						<td><b>Frequência</b></td>
					</tr>
					<?php
					foreach($alunes as $alune){
						include_once("../controller/presenca.php");
						$PresencaController = new PresencaController();
						$presencas = $PresencaController->getPresencaPeriodo(
							$_GET['cod_sala'],
							$alune['id'],
							0,
							0,
							$_GET['data_inicial'],
							$_GET['data_final']
						);
						$ausencias = $PresencaController->getAusenciaPeriodo(
							$_GET['cod_sala'],
							$alune['id'],
							0,
							0,
							$_GET['data_inicial'],
							$_GET['data_final']
						);
						$justificado = $PresencaController->getJustificadoPeriodo(
							$_GET['cod_sala'],
							$alune['id'],
							0,
							0,
							$_GET['data_inicial'],
							$_GET['data_final']
						);

						$presencas = count($presencas);
						$justificado = count($justificado);
						$ausencias = count($ausencias);
						$total = $presencas + $justificado + $ausencias ;
						$total = $total > 0 ? $total : 1;
						$porcentagem = ( ($presencas + $justificado) / $total ) * 100;
						
						$color = $porcentagem >= 70 ? "green" : "red";
						?>		
						<tr style= "color: <?= $color?>; border-bottom: 1px solid #555;">
							<td><?= $alune['nome']?></td>
							<td><?= $presencas?></td>
							<td><?= $ausencias?></td>
							<td><?= $justificado?></td>
							<td><?= number_format($porcentagem, 2, '.', ',')?>%</td>
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