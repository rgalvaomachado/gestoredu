<head>
	<?php include_once('src/controller/UsuarioController.php')?>
    <link href="/public/view/aluno/styles.css" rel="stylesheet">
    <script src="/public/view/aluno/index.js"></script>
</head>
<div class="grid-content grid-container">
	<?php include_once('public/menu.php')?>
    <div class="grid-item-content">
        <?php include_once('public/top.php')?>
        <label class="title">Aluno(a)</label> <a href="/aluno/criar"><i class="title fa fa-plus-square-o" aria-hidden="true"></i></a>
		<br>
		<label class="message_alert" id="messageAlert"></label>
        <br>
		<?php
			$UsuarioController = new UsuarioController();
			$usuarios = json_decode($UsuarioController->buscarTodos(['grupo' => '1']))->usuarios;
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
                <?php foreach ($usuarios as $usuario){ ?>
                    <tr>
                        <td class="text-left">
                            <?php echo $usuario->nome ?>
                        </td>
                        <td>
                            <a href="/aluno/editar?id=<?php echo $usuario->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="/aluno/deletar?id=<?php echo $usuario->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>