<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/public/verifica_sessao.php');
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
        <label class="title">Sala</label> <a href="/sala/criar"><i class="title fa fa-plus-square-o" aria-hidden="true"></i></a>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php
			$SalaController = new SalaController();
			$salas = json_decode($SalaController->buscarTodos())->salas;
		?>
		<table class="list">
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
            <tbody>
                <?php foreach ($salas as $sala){ ?>
                    <tr>
                        <td class="text-left">
                            <?php echo $sala->nome ?>
                        </td> 
                        <td>
                            <a href="/sala/editar?id=<?php echo $sala->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="/sala/deletar?id=<?php echo $sala->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>