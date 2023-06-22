<head>
    <?php include_once('../includes/head.html')?>
	<?php include_once('../../controller/DisciplinaController.php')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
	<?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
        <label class="title">Disciplina</label> <a href="../disciplina/criar.php"><i class="title fa fa-plus-square-o" aria-hidden="true"></i></a>
		<br>
		<label class="message_alert" id="messageAlert"></label>
        <br>
		<?php 
			$DisciplinaController = new DisciplinaController();
			$disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
		?>
		<table class="list">
            <tbody>
                <?php foreach ($disciplinas as $disciplina){ ?>
                    <tr>
                        <td>
                            <?php echo $disciplina->nome ?>
                        </td> 
                        <td>
                            <a href="../disciplina/editar.php?id=<?php echo $disciplina->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="../disciplina/deletar.php?id=<?php echo $disciplina->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>