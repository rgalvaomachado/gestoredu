<head>
    <?php include_once('../includes/head.html')?>
	<?php include_once('../../controller/UsuarioController.php')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<div class="grid-content grid-container">
	<?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
        <?php include_once('../includes/top.html')?>
        <label class="title">Aluno(a)</label> <a href="../aluno/criar.php"><i class="title fa fa-plus-square-o" aria-hidden="true"></i></a>
		<br>
		<label class="message_alert" id="messageAlert"></label>
        <br>
		<?php
			$UsuarioController = new UsuarioController();
			$usuarios = json_decode($UsuarioController->buscarTodos(['grupo' => '1']))->usuarios;
		?>
		<table class="list">
            <tbody>
                <?php foreach ($usuarios as $usuario){ ?>
                    <tr>
                        <td>
                            <?php echo $usuario->nome ?>
                        </td> 
                        <td>
                            <a href="../aluno/editar.php?id=<?php echo $usuario->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="../aluno/deletar.php?id=<?php echo $usuario->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>