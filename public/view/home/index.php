<head>
    <link href="/public/view/home/styles.css" rel="stylesheet">
    <script src="/public/view/home/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <div class="grid-item-content">
        <?php include_once('public/top.php')?>
        <?php
            $UsuarioController = new UsuarioController();
            $usuarios = json_decode($UsuarioController->buscarTodos())->usuarios;
            $qtdUsuarios = count($usuarios);

            $UsuarioController = new UsuarioController();
            $alunos = json_decode($UsuarioController->buscarTodos(['grupo' => '1']))->usuarios;
            $qtdAlunos = count($alunos);

            $UsuarioController = new UsuarioController();
            $professores = json_decode($UsuarioController->buscarTodos(['grupo' => '2']))->usuarios;
            $qtdProfessores = count($professores);

            $SalaController = new SalaController();
            $salas = json_decode($SalaController->buscarTodos())->salas;
            $qtdSalas = count($salas);

            $DisciplinaController = new DisciplinaController();
            $disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
            $qtdDisciplinas = count($disciplinas);

        ?>
        <div class="grid-container-graficos">
            <div class="grid-item-graficos">
                <label class="title">Salas</label>
                <br>
                <label style="font-size: 50px;"><?php echo $qtdSalas ?></label>
            </div>
            <div class="grid-item-graficos">
                <label class="title">Usuarios</label>
                <br>
                <label style="font-size: 50px;"><?php echo $qtdUsuarios ?></label>
            </div>
            <div class="grid-item-graficos">
                <label class="title">Disciplinas</label>
                <br>
                <label style="font-size: 50px;"><?php echo $qtdDisciplinas ?></label>
            </div>
            <div class="grid-item-graficos">
                <label class="title">Alunos</label>
                <br>
                <label style="font-size: 50px;"><?php echo $qtdAlunos ?></label>
            </div>
            <div class="grid-item-graficos">
                <label class="title">Professores</label>
                <br>
                <label style="font-size: 50px;"><?php echo $qtdProfessores ?></label>
            </div>
        </div>
    </div>
</div>