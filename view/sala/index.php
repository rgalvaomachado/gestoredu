<head>
    <?php include_once('../includes/head.html')?>
	<?php include_once('../../controller/SalaController.php')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<div class="grid-content grid-container">
	<?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
        <?php include_once('../includes/top.php')?>
        <label class="title">Sala</label> <a href="../sala/criar.php"><i class="title fa fa-plus-square-o" aria-hidden="true"></i></a>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php
			$SalaController = new SalaController();
			$salas = json_decode($SalaController->buscarTodos())->salas;
		?>
		<table class="list">
            <tbody>
                <?php foreach ($salas as $sala){ ?>
                    <tr>
                        <td>
                            <?php echo $sala->nome ?>
                        </td> 
                        <td>
                            <a href="../sala/editar.php?id=<?php echo $sala->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="../sala/deletar.php?id=<?php echo $sala->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>