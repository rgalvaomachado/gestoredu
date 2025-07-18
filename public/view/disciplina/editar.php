<?php 
	include_once($_SERVER['DOCUMENT_ROOT'].'/public/verifica_sessao.php');
    if (!isset($_GET['id'])){
        header("Location: /disciplina");
        die();
    }
?>
<head>
    <link href="/public/view/disciplina/styles.css" rel="stylesheet">
    <script src="/public/view/disciplina/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
		<label class="title">Editar Disciplina</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$DisciplinaController = new DisciplinaController();
			$DisciplinaController = json_decode($DisciplinaController->buscar(['id' => $_GET['id']]));
			$disciplina = $DisciplinaController->disciplina;
		?>
		<form id="editar">
			<input type="hidden" id="disciplina" name="disciplina" value="<?php echo $disciplina->id?>">
			<label>Nome</label>
			</br>
			<input class='input' name="nome" id="nome" value="<?php echo $disciplina->nome?>">
			</br>
			</br>
			<label><b>Inscricoes <?php echo "(".count($disciplina->inscricoes).")"?></b></label>
			<?php foreach($disciplina->inscricoes as $inscricao) {?>
				<div id='listaUsurios'>
					<label>Nome: <?php echo $inscricao->nome ?> - Sala: <?php echo $inscricao->nome_sala ?></label><br>
				</div>
			<?php } ?>
			<br>
			<br>
			<input class='button editar' type="submit" value="Editar">
		</form>
    </div>
</div>