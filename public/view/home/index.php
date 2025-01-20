<head>
    <link href="/public/view/home/styles.css" rel="stylesheet">
    <script src="/public/view/home/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once('../public/menu.php')?>
    <div class="grid-item-content">
        <?php include_once('../public/top.php')?>
        <div class="grid-container-graficos">
            <div class="grid-item-graficos">
                <label class="title">Salas</label>
                <br>
                <label id="qtdSalas" class="qtd"></label>
                <script>loadSalas()</script>
            </div>
            <div class="grid-item-graficos">
                <label class="title">Usuarios</label>
                <br>
                <label id="qtdUsuarios" class="qtd"></label>
                <script>loadUsuarios()</script>
            </div>
            <div class="grid-item-graficos">
                <label class="title">Disciplinas</label>
                <br>
                <label id="qtdDisciplinas" class="qtd"></label>
                <script>loadDisciplinas()</script>
            </div>
            <div class="grid-item-graficos">
                <label class="title">Alunos</label>
                <br>
                <label id="qtdAlunos" class="qtd"></label>
                <script>loadAlunos()</script>
            </div>
            <div class="grid-item-graficos">
                <label class="title">Professores</label>
                <br>
                <label id="qtdProfessores" class="qtd"></label>
                <script>loadProfessores()</script>
            </div>
        </div>
    </div>
</div>