<head>
	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/src/controller/HorarioController.php')?>
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/src/controller/UtilsController.php')?>
    <link href="/public/view/horario/styles.css" rel="stylesheet">
    <script src="/public/view/horario/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
        <label class="title">Horário</label> <a href="/horario/criar"><i class="title fa fa-plus-square-o" aria-hidden="true"></i></a>
		<br>
		<label class="message_alert" id="messageAlert"></label>
        <br>
        <form action="">
            <?php 
                $UtilsController = new UtilsController();
                $HorarioController = new HorarioController();
                
                $data_horarios = [];
                $hoje = $cod_usuario = $cod_sala = $cod_disciplina = "";
                $total_duracao = "00:00:00" ;

                if (isset($_GET['hoje'])) {
                    $hoje = true;
                    $data_horarios['dia_semana'] = $UtilsController->getCodDiaSemanaAtual();
                }

                if (isset($_GET['cod_usuario'])) {
                    $cod_usuario = $_GET['cod_usuario'];
                    $data_horarios['cod_usuario'] = $cod_usuario;
                }

                if (isset($_GET['cod_sala'])) {
                    $cod_sala = $_GET['cod_sala'];
                    $data_horarios['cod_sala'] = $cod_sala;
                }

                if (isset($_GET['cod_disciplina'])) {
                    $cod_disciplina = $_GET['cod_disciplina'];
                    $data_horarios['cod_disciplina'] = $cod_disciplina;
                }

                $horarios = json_decode($HorarioController->buscarTodos($data_horarios))->horarios;
               
               
            ?>
            <table class="list filtro">
                <tbody>
                        <tr>
                            <td class="text-left">
                                <label>Hoje</label>
                            </td>
                            <td class="text-left">
                                <input class='checkbox' type="checkbox" name="hoje" <?php if ($hoje) {echo "checked";}?>>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">
                                <label>Professor</label>
                            </td>
                            <td class="text-left">
                                <?php
                                    $UsuarioController = new UsuarioController();
                                    $usuarios = json_decode($UsuarioController->buscarTodos(['grupo' => '2']))->usuarios;
                                ?>
                                <select class='input' id="cod_usuario" name="cod_usuario" required>
                                    <option value="0"> Todos </option>
                                    <?php foreach ($usuarios as $usuario) { ?>
                                        <option value="<?php echo $usuario->id ?>" <?php echo ($cod_usuario == $usuario->id) ? "selected" : "" ?> > <?php echo $usuario->nome ?></option>	
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">
                                <label>Sala</label>
                            </td>
                            <td class="text-left">
                                <?php
                                    $SalaControler = new SalaController();
                                    $salas = json_decode($SalaControler->buscarTodos())->salas;
                                ?>
                                <select class='input' id="cod_sala" name="cod_sala" required>
                                    <option value="0"> Todos </option>
                                    <?php foreach ($salas as $sala) { ?>
                                        <option value="<?php echo $sala->id ?>" <?php echo ($cod_sala == $sala->id) ? "selected" : "" ?> > <?php echo $sala->nome ?></option>	
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">
                                <label>Disciplina</label>
                            </td>
                            <td class="text-left">
                                <?php
                                    $DisciplinaController = new DisciplinaController();
                                    $disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
                                ?>
                                <select class='input' id="cod_disciplina" name="cod_disciplina" required>
                                    <option value="0"> Todos </option>
                                    <?php foreach ($disciplinas as $disciplina) { ?>
                                        <option value="<?php echo $disciplina->id ?>" <?php echo ($cod_disciplina == $disciplina->id) ? "selected" : "" ?> > <?php echo $disciplina->nome ?></option>	
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                </tbody>
            </table>
            <br>
            <input class='button editar' type="submit" value="Filtrar">
        </form>
        <br>
        <br>
        <br>
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
                        Disciplina
                    </th>
                    <th>
                        Dia da Semana
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
                            <?php echo $horario->disciplina_nome ?>
                        </td>
                        <td class="text-left">
                            <?php echo $UtilsController->getNomeDiaSemana($horario->dia_semana)?>
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
                        <?php
                                $hora1 = $total_duracao;
                                $hora2 = $horario->duracao;
                                
                                // Converte o primeiro horário em segundos
                                list($horas1, $minutos1, $segundos1) = explode(':', $hora1);
                                $totalSegundos1 = ($horas1 * 3600) + ($minutos1 * 60) + $segundos1;
                            
                                // Converte o segundo horário em segundos
                                list($horas2, $minutos2, $segundos2) = explode(':', $hora2);
                                $totalSegundos2 = ($horas2 * 3600) + ($minutos2 * 60) + $segundos2;
                            
                                // Soma os segundos
                                $totalSegundos = $totalSegundos1 + $totalSegundos2;
                            
                                // Converte de volta para o formato H:i:s
                                $horas = floor($totalSegundos / 3600);
                                $minutos = floor(($totalSegundos % 3600) / 60);
                                $segundos = $totalSegundos % 60;
                            
                                // Retorna o resultado formatado como H:i:s
                                $total_duracao = sprintf('%02d:%02d:%02d', $horas, $minutos, $segundos);
                        ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <label class="subTitle">Total: <?php echo $total_duracao ?></label>
    </div>
</div>