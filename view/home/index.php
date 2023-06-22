<head>
    <?php include_once('../../controller/UsuarioController.php')?>
    <?php include_once('../../controller/SalaController.php')?>
    <?php include_once('../../controller/DisciplinaController.php')?>

    <?php include_once('../includes/head.html')?>
    <link href="../view/home/styles.css" rel="stylesheet">
    <script src="../view/home/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
        <?php include_once('../includes/top.php')?>
        <div id="graficos">
            <!-- <div class="pie" style="--p:20"> 20%</div> -->
            <!-- <div class="pie" style="--p:40;--c:darkblue;--b:10px"> 40%</div> -->
            <!-- <div class="pie no-round" style="--p:60;--c:purple;--b:15px"> 60%</div> -->
            <!-- <div class="pie animate no-round" style="--p:80;--c:orange;"> 80%</div> -->
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

                $porcentagemAlunos = number_format(($qtdAlunos/$qtdUsuarios)*100,2);
                $porcentagemProfessores = number_format(($qtdProfessores/$qtdUsuarios)*100,2);
            ?>
            <div class="graficos">
                <label class="title">Usuarios</label>
                <br>
                <label style="font-size: 50px;"><?php echo $qtdUsuarios ?></label>
            </div>
            <div class="graficos">
                <label class="title">Disciplinas</label>
                <br>
                <label style="font-size: 50px;"><?php echo $qtdDisciplinas ?></label>
            </div>
            <div class="graficos">
                <label class="title">Salas</label>
                <br>
                <label style="font-size: 50px;"><?php echo $qtdSalas ?></label>
            </div>
            <div class="graficos">
                <label class="title">Professores</label>
                <br>
                <div class="pie animate" style="--p:<?= $porcentagemProfessores ?>90;--c:#004fde"> <?= $porcentagemProfessores ?>%</div>
            </div>
            <div class="graficos">
                <label class="title">Alunos</label>
                <br>
                <div class="pie animate" style="--p:<?= $porcentagemAlunos ?>;--c:#004fde"> <?= $porcentagemAlunos ?>%</div>
            </div>
            
        </div>
    </div>
</div>