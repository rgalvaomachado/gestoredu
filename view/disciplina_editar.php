<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body style="background-color:white">
	<?php include_once 'top_bar.php'?>
	<?php include_once 'menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Editar Disciplinas</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
			<h4><?= (isset($_GET['delete']) && $_GET['delete'] == true ? "Excluido !" : "") ?></h4>
			<form action="controller/controller.php" method="post">
				<input type="hidden" name="metodo" value="buscarDisciplina">
				<?php
					include_once("../controller/disciplina.php");
					$DisciplinaController = new DisciplinaController();
					$disciplinas = $DisciplinaController->getDisciplinas();
				?>
				<div class="form-group">
					<label>Disciplinas</label>
					<?php $id = (isset($_GET['disciplina']) ? $_GET['disciplina'] : 1) ?>
					<select name="disciplina" class="form-control">
						<?php foreach($disciplinas as $disciplina){ ?>
							<option value="<?= $disciplina['id'] ?>" <?= $disciplina['id'] == $id ? "selected" : ""?> > <?= $disciplina['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<?php
				if(isset($_GET['disciplina'])){
					include_once("../controller/disciplina.php");
					$getDisciplina = new DisciplinaController();
					$disciplina = $getDisciplina->getDisciplina($_GET['disciplina']);
			?>
				<form action="controller/controller.php" method="post" style="padding-bottom: 1%;">
					<input type="hidden" name="metodo" value="salvarDisciplina">
					<input type="hidden" name="id" value="<?= $_GET['disciplina'] ?>">
					<div class="row" >
						<div class="form-group">
							<label>Nome</label>
							<input name="nome" value="<?= $disciplina['nome'] ?>" class="form-control">
						</div>
						<button type="submit" class="btn btn-md btn-warning">Editar</button>
					</div>
				</form>
				<form action="controller/controller.php" method="post" onSubmit="if(!confirm('Tem certeza que deseja excluir?')){return false;}">
					<input type="hidden" name="metodo" value="excluirDisciplina">
					<input type="hidden" name="id" value="<?= $_GET['disciplina'] ?>">
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