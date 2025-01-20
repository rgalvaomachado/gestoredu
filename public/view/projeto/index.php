<head>
    <link href="/public/view/projeto/styles.css" rel="stylesheet">
    <script src="/public/view/projeto/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
        <label class="title">Projeto</label> <a href="/projeto/criar"><i class="title fa fa-plus-square-o" aria-hidden="true"></i></a>
		<br>
		<label class="message_alert" id="messageAlert"></label>
        <br>
		<?php 
			$ProjetoController = new ProjetoController();
			$projetos = json_decode($ProjetoController->buscarTodos())->projetos;
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
                <?php foreach ($projetos as $projeto){ ?>
                    <tr>
                        <td class="text-left">
                            <?php echo $projeto->nome ?>
                        </td> 
                        <td>
                            <a href="/projeto/editar?id=<?php echo $projeto->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="/projeto/deletar?id=<?php echo $projeto->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>