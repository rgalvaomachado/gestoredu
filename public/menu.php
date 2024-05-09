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

    $menu_aluno = $menu_professor = $menu_disciplina = $menu_sala = $menu_presenca = $menu_frequencia = $menu_certificado = '';
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
        case 'frequencia':
            $menu_frequencia = $style;
            break;
        case 'certificado':
            $menu_certificado = $style;
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
                    <a href="/presenca" style="<?php echo $menu_presenca_chamada_listada?>">
                        <em class="fa fa-calendar"></em>&nbsp;Presenca
                    </a>
                </div>
            </li>
            <li>
                <div class="itemMenu">
                    <a href="/frequencia" style="<?php echo $menu_frequencia_frequencia_listada?>">
                        <em class="fa fa-bar-chart"></em>&nbsp;Frequência
                    </a>
                </div>
            </li>
            <li>
                <div class="itemMenu">
                    <a href="/certificado" style="<?php echo $menu_certificado?>">
                        <em class="fa fa-file-pdf-o" aria-hidden="true"></em>&nbsp;Certificado
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
<script>

</script>