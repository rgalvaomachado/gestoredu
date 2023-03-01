<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body style="background-color:white">
	<?php include_once 'top_bar.php'?>
	<?php include_once 'menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Editar Representantes</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
			<h4><?= (isset($_GET['delete']) && $_GET['delete'] == true ? "Excluido !" : "") ?></h4>
			<form action="controller/controller.php" method="post">
				<input type="hidden" name="metodo" value="buscarRepresentante">
				<?php
					include_once("../controller/representante.php");
					$RepresentanteController = new RepresentanteController();
					$representantes = $RepresentanteController->getRepresentantes();
				?>
				<div class="form-group">
					<label>Representantes</label>
					<?php $idRepresentante = (isset($_GET['representante']) ? $_GET['representante'] : 1) ?>
					<select name="representante" class="form-control">
						<?php foreach($representantes as $representante){ ?>
							<option value="<?= $representante['id'] ?>" <?= $representante['id'] == $idRepresentante ? "selected" : ""?> > <?= $representante['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<?php
				if(isset($_GET['representante'])){
					include_once("../controller/representante.php");
					$getRepresentante = new RepresentanteController();
					$representante = $getRepresentante->getRepresentante($_GET['representante']);
				?>
				<form action="controller/controller.php" method="post" enctype="multipart/form-data" style="padding-bottom: 1%;">
					<input type="hidden" name="metodo" value="salvarRepresentante">
					<input type="hidden" name="id" value="<?= $_GET['representante'] ?>">
					<div class="row" >
						<div class="form-group">
							<label>Nome</label>
							<input class="form-control" name="nome" value="<?= $representante['nome']?>" required>
						</div>
						<div class="form-group">
							<label>Usuario</label>
							<input class="form-control" name="usuario" value=<?= $representante['usuario']?> required>
						</div>
						<div class="form-group">
							<label>Senha</label>
							<input type="password" class="form-control" name="senha" required>
						</div>
						<div class="form-group">
						<label>Assinatura</label>
							<input name="assinatura" type="file" class="form-control">
						</div>
						<div class="form-group" style="border: 1px solid black;">
							<label style="color:gray">Assinatura Atual</label>
							<br>
							<?php if (file_exists(dirname(__FILE__)."/../public/assinatura/".$_GET['representante'].".png")) { ?>
								<img style="width:150px" src="<?php echo "public/assinatura/".$_GET['representante'].".png" ?>">
							<?php } ?>
						</div>
						<button type="submit" class="btn btn-md btn-warning">Editar</button>
					</div>
				</form>
				<form action="controller/controller.php" method="post" onSubmit="if(!confirm('Tem certeza que deseja excluir?')){return false;}">
					<input type="hidden" name="metodo" value="excluirRepresentante">
					<input type="hidden" name="id" value="<?= $_GET['representante'] ?>">
					<button type="submit" class="btn btn-md btn-danger">Excluir</button>
				</form>
			<?php } ?>
		</center>
	</div>
	<script src="public\js\jquery-1.11.1.min.js"></script>
	<script src="public\js\bootstrap.min.js"></script>
	<script src="public\js\login.js"></script></script>
</body>
</html>