<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/public/verifica_sessao.php');
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
        <label class="title">Disciplina</label> <a href="/disciplina/criar"><i class="title fa fa-plus-square-o" aria-hidden="true"></i></a>
		<br>
		<label class="message_alert" id="messageAlert"></label>
        <br>
		<?php 
			$DisciplinaController = new DisciplinaController();
			$disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
		?>
		<table class="list">
            <tbody>
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>
                        Editar
                    </th>
                    <th>
                        Deletar
                    </th>
                </tr>
                <?php foreach ($disciplinas as $disciplina){ ?>
                    <tr>
                        <td class="text-left">
                            <?php echo $disciplina->nome ?>
                        </td> 
                        <td>
                            <a href="/disciplina/editar?id=<?php echo $disciplina->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="/disciplina/deletar?id=<?php echo $disciplina->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>