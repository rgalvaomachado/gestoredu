<?php 
	include_once($_SERVER['DOCUMENT_ROOT'].'/public/verifica_sessao.php');
    if (!isset($_GET['id'])){
        header("Location: /sala");
        die();
    }
?>
<head>
    <link href="/public/view/sala/styles.css" rel="stylesheet">
    <script src="/public/view/sala/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
		<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
		<label class="title">Editar Sala</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php 
			$SalaController = new SalaController();
			$SalaController = json_decode($SalaController->buscar(['id' => $_GET['id']]));
			$sala = $SalaController->sala;
		?>
		<form id="editar">
			<input type="hidden" id="id" name="id" value="<?php echo $sala->id?>">
			<label>Nome</label>
			</br>
			<input class='input' name="nome" id="nome" value="<?php echo $sala->nome?>">
			</br>
			<label>Disciplinas</label>
            <br>
            <?php
				$sala_disciplinas = [];
				foreach ($sala->disciplinas as $sala_disciplina) {
					$sala_disciplinas[] = $sala_disciplina->cod_disciplina;
				}

                $DisciplinaController = new DisciplinaController();
                $disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
            ?>
            <div id='gruposTodos'>
                <?php foreach ($disciplinas as $disciplina) { ?>
					<input 
						type='checkbox' 
						class="checkbox" 
						id="disciplinas" 
						name="disciplinas" 
						data-cod_disciplina="<?php echo $disciplina->id ?>"
						<?php echo in_array($disciplina->id, $sala_disciplinas) ? "checked" : "" ?> 
					><?php echo $disciplina->nome ?>
					<br>
                <?php } ?>
            </div>
            <br>
			</br>
			<label><b>Inscricoes <?php echo "(".count($sala->inscricoes).")"?></b></label>
			<?php foreach($sala->inscricoes as $inscricao) {?>
				<div id='listaUsurios'>
					<label>Nome: <?php echo $inscricao->nome ?> - Disciplina: <?php echo $inscricao->nome_disciplina ?></label><br>
				</div>
			<?php } ?>
			<br>
			<br>
			<input class='button editar' type="submit" value="Editar">
		</form>
</div>