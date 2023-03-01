<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body style="background-color:white">
	<?php include_once 'top_bar.php'?>
	<?php include_once 'menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Editar Comissão</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
			<h4><?= (isset($_GET['delete']) && $_GET['delete'] == true ? "Excluido !" : "") ?></h4>
			<form action="controller/controller.php" method="post">
				<input type="hidden" name="metodo" value="buscarComissao">
				<?php
					include_once("../controller/comissao.php");
					$ComissaoController = new ComissaoController();
					$comissoes = $ComissaoController->getComissoes();
				?>
				<div class="form-group">
					<label>Comissoes</label>
					<?php $idComissao = (isset($_GET['comissao']) ? $_GET['comissao'] : 1) ?>
					<select name="comissao" class="form-control">
						<?php foreach($comissoes as $comissao){ ?>
							<option value="<?= $comissao['id'] ?>" <?= $comissao['id'] == $idComissao ? "selected" : ""?> > <?= $comissao['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<?php
				if(isset($_GET['comissao'])){
					include_once("../controller/comissao.php");
					$getComissao = new ComissaoController();
					$comissao = $getComissao->getComissao($_GET['comissao']);
				?>
				<form action="controller/controller.php" method="post" style="padding-bottom: 1%;">
					<input type="hidden" name="metodo" value="salvarComissao">
					<input type="hidden" name="id" value="<?= $_GET['comissao'] ?>">
					<div class="row" >
						<div class="form-group">
							<label>Nome</label>
							<input class="form-control" name="nome" value="<?= $comissao['nome']?>" required>
						</div>
						<div class="form-group">
							<label>Usuario</label>
							<input class="form-control" name="usuario" value=<?= $comissao['usuario']?> required>
						</div>
						<div class="form-group">
							<label>Senha</label>
							<input type="password" class="form-control" name="senha" required>
						</div>
						<button type="submit" class="btn btn-md btn-warning">Editar</button>
					</div>
				</form>
				<form action="controller/controller.php" method="post" onSubmit="if(!confirm('Tem certeza que deseja excluir?')){return false;}">
					<input type="hidden" name="metodo" value="excluirComissao">
					<input type="hidden" name="id" value="<?= $_GET['comissao'] ?>">
					<button type="submit" class="btn btn-md btn-danger">Excluir</button>
				</form>
			<?php } ?>
		</center>
	</div>
	
	<script src="public\js\jquery-1.11.1.min.js"></script>
	<script src="public\js\bootstrap.min.js"></script>
	<script src="public\js\login.js"></script></script>

	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>		
</body>
</html>