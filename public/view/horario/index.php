<head>
	<?php include_once('src/controller/HorarioController.php')?>
    <?php include_once('src/controller/UtilsController.php')?>
    <link href="/public/view/horario/styles.css" rel="stylesheet">
    <script src="/public/view/horario/index.js"></script>
</head>
<div class="grid-content grid-container">
	<?php include_once('public/menu.php')?>
    <div class="grid-item-content">
        <?php include_once('public/top.php')?>
        <label class="title">Horarios</label> <a href="/horario/criar"><i class="title fa fa-plus-square-o" aria-hidden="true"></i></a>
		<br>
		<label class="message_alert" id="messageAlert"></label>
        <br>
		<?php
            $UtilsController = new UtilsController();
            $dia_semana = $UtilsController->getDiaSemana();

			$HorarioController = new HorarioController();
			$horarios = json_decode($HorarioController->buscarTodos(['dia_semana' => $dia_semana]))->horarios;
		?>
		<table class="list">
            <tbody>
                <tr>
                    <th>
                        Professor
                    </th>
                    <th>
                        Sala
                    </th>
                    <th>
                        Horario Inicio
                    </th>
                    <th>
                        Horario Fim
                    </th>
                </tr>
                <?php foreach ($horarios as $horario){ ?>
                    <tr style="background-color: <?php echo $horario->cor ?>;">
                        <td class="text-left">
                            <?php echo $horario->usuario_nome ?>
                        </td>
                        <td class="text-left">
                            <?php echo $horario->sala_nome ?>
                        </td>
                        <td class="text-left">
                            <?php echo $horario->hora_inicio ?>
                        </td>
                        <td class="text-left">
                            <?php echo $horario->hora_fim ?>
                        </td>
                        <td>
                            <a href="/horario/editar?id=<?php echo $horario->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="/horario/deletar?id=<?php echo $horario->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>