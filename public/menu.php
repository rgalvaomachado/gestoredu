<head>
    <script src="https://kit.fontawesome.com/7ca1b2bc88.js" crossorigin="anonymous"></script>
    <script src="/public/js/menu.js"></script>
</head>
<?php
    $style = '
        border-left: 5px solid #00b3f5;
        background-color: #00b4f544;
        color: white !important;
    ';

    $menu_aluno = $menu_professor = $menu_disciplina = $menu_sala = $menu_presenca = $menu_relatorio = '';
    $url_menu = explode('/',$url);
    $menu = $url_menu[0];

    switch ($menu) {
        case 'aluno':
            $menu_aluno = $style;
            break;
        case 'professor':
            $menu_professor = $style;
            break;
        case 'disciplina':
            $menu_disciplina = $style;
            break;
        case 'sala':
            $menu_sala = $style;
            break;
        case 'presenca':
            $menu_presenca = $style;
            break;
        case 'relatorio':
            $menu_relatorio = $style;
            break;
        default:
            # code...
            break;
    }

?>
<div class="grid-item-menu">
    <a href="/home">
        <img src="/public/img/logo_branco.png" id="logo-gestoredu">
    </a>
    <div class="menu" id="menu">
        <ul id="listMenu">
            <li>
                <div class="itemMenu">
                    <a  href="/aluno" style="<?php echo $menu_aluno?>">
                        <em class="fa fa-graduation-cap" aria-hidden="true"></em>&nbsp;Aluno(a)
                    </a>
                </div>
            </li>
            <li>
                <div class="itemMenu">
                    <a href="/professor" style="<?php echo $menu_professor?>">
                        <em class="fa fa-user" aria-hidden="true"></em>&nbsp;Professor(a)
                    </a>
                </div>
            </li>
            <li>
                <div class="itemMenu">
                    <a href="/disciplina" style="<?php echo $menu_disciplina?>">
                        <em class="fa fa-newspaper-o" aria-hidden="true"></em>&nbsp;Disciplina
                    </a>
                </div>
            </li>
            <li>
                <div class="itemMenu">
                    <a href="/sala" style="<?php echo $menu_sala?>">
                        <em class="fa fa-university" aria-hidden="true"></em>&nbsp;Sala
                    </a>
                </div>
            </li>
            <li>
                <div class="itemMenu">
                    <a href="/presenca/aluno" style="<?php echo $menu_presenca?>">
                        <em class="fa fa-calendar"></em>&nbsp;Chamada de Alunos
                    </a>
                </div>
            </li>
            <li>
                <div class="itemMenu">
                    <a href="/relatorio/frequenciaaluno" style="<?php echo $menu_relatorio?>">
                        <em class="fa fa-bar-chart"></em>&nbsp;Frequência de Alunos
                    </a>
                </div>
            </li>
            <!-- <li>
                <input type="checkbox" id="menuAluno" class="subMenu"/>
                <label for="menuAluno">
                    <a href="../aluno/criar.php" style="<?php echo $menuAluno?>"'></a>
                    <em class="fa fa-graduation-cap" aria-hidden="true"></em>&nbsp;Aluno(a)
                    <em class="fa fa-plus"></em>
                </label>
                <ul>
                    <li><a href="../aluno/criar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Criar</a></li>
                    <li><a href="../aluno/editar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                </ul>
            </li> -->
            <!-- <li>
                <input type="checkbox" id="menuProfessor" class="subMenu"/>
                <label for="menuProfessor">
                    <em class="fa fa-user" aria-hidden="true"></em>&nbsp;Professor(a)
                    <em class="fa fa-plus"></em>
                </label>
                <ul>
                    <li><a href="../professor/criar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Criar</a></li>
                    <li><a href="../professor/editar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                </ul>
            </li> -->
            <!-- <li>
                <input type="checkbox" id="menuUsuario" class="subMenu"/>
                <label for="menuUsuario">
                    <em class="fa fa-user-plus" aria-hidden="true"></em>&nbsp;Usuarios
                    <em class="fa fa-plus"></em>
                </label>
                <ul>
                    <li><a href="../usuario/criar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Criar</a></li>
                    <li><a href="../usuario/editar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="menuGrupo" class="subMenu"/>
                <label for="menuGrupo">
                    <em class="fa fa-users" aria-hidden="true"></em>&nbsp;Grupos
                    <em class="fa fa-plus"></em>
                </label>
                <ul>
                    <li><a href="../grupo/criar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Criar</a></li>
                    <li><a href="../grupo/editar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                </ul>
            </li> -->
            <!-- <li>
                <input type="checkbox" id="menuDisciplina" class="subMenu"/>
                <label for="menuDisciplina">
                    <em class="fa fa-newspaper-o" aria-hidden="true"></em>&nbsp;Disciplina
                    <em class="fa fa-plus"></em>
                </label>
                <ul>
                    <li><a href="../disciplina/criar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Criar</a></li>
                    <li><a href="../disciplina/editar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                </ul>
            </li> -->
            <!-- <li>
                <input type="checkbox" id="menuSala" class="subMenu"/>
                <label for="menuSala">
                    <em class="fa fa-university" aria-hidden="true"></em>&nbsp;Sala
                    <em class="fa fa-plus"></em>
                </label>
                <ul>
                    <li><a href="../sala/criar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Criar</a></li>
                    <li><a href="../sala/editar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                </ul>
            </li> -->
            <!-- <li>
                <div class="itemMenu">
                    <input type="checkbox" id="menuPresenca" class="subMenu"/>
                    <label for="menuPresenca">
                        <em class="fa fa-calendar" aria-hidden="true"></em>&nbsp;Presença
                        <em class="fa fa-plus"></em>
                    </label>
                    <ul>
                        <li><a href="../presenca/aluno.php" style="<?php echo $menu_presenca?>"><em class="fa fa-arrow-right">&nbsp;</em>Chamada de Alunos</a></li>
                        <li><a href="../presenca/chamada.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Chamada Grupo</a></li>
                        <li><a href="../presenca/professor.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Ponto Eletronico Professor</a></li>
                        <li><a href="../presenca/ponto.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Ponto Eletronico</a></li>
                        <li><a href="../presenca/editar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                    </ul>
                </div>
            </li> -->
            <!-- <li>
                <input type="checkbox" id="menuCertificado" class="subMenu"/>
                <label for="menuCertificado">
                    <em class="fa fa-file-pdf-o" aria-hidden="true"></em>&nbsp;Certificado
                    <em class="fa fa-plus"></em>
                </label>
                <ul>
                    <li><a href="../certificado/gerar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Gerar</a></li>
                </ul>
            </li> -->
            <!-- <li>
                <div class="itemMenu">
                    <input type="checkbox" id="menuRelatorio" class="subMenu"/>
                    <label for="menuRelatorio">
                        <em class="fa fa-bar-chart" aria-hidden="true"></em>&nbsp;Relatorio
                        <em class="fa fa-plus"></em>
                    </label>
                    <ul>
                        <li><a href="../relatorio/gerar.php" style="<?php echo $menuAluno?>"'><em class="fa fa-arrow-right">&nbsp;</em>Gerar</a></li>
                        <li><a href="../relatorio/freqaluno.php" style="<?php echo $menu_relatorio?>"><em class="fa fa-arrow-right">&nbsp;</em>Frequência de Alunos</a></li>
                    </ul>
                </div>
            </li> -->
        </ul>
    </div>
</div>
<script>

</script>