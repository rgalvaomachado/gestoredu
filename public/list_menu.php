<?php
    $style = '
        border-left: 5px solid #00b3f5;
        background-color: #00b4f544;
        color: white !important;
    ';

    $menu_home = $menu_aluno = $menu_professor = $menu_disciplina = $menu_sala = $menu_presenca = $menu_frequencia = $menu_certificado = $menu_projeto = '';
    $url_menu = explode('/',$url);
    $menu = $url_menu[0];

    switch ($menu) {
        case 'home':
            $menu_home = $style;
            break;
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
        case 'horario':
            $menu_horario = $style;
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
        case 'configuracao':
            $menu_configuracao = $style;
            break;
        case 'projeto':
            $menu_projeto = $style;
            break;
        default:
            # code...
            break;
    }
?>
<div class="itemMenu">
    <a  href="/aluno" style="<?php echo $menu_aluno?>">
        <em class="fa fa-graduation-cap" aria-hidden="true"></em>&nbsp;Aluno(a)
    </a>
</div>
<div class="itemMenu">
    <a href="/professor" style="<?php echo $menu_professor?>">
        <em class="fa fa-user" aria-hidden="true"></em>&nbsp;Professor(a)
    </a>
</div>
<div class="itemMenu">
    <a href="/projeto" style="<?php echo $menu_projeto?>">
        <em class="fa fa-file-o" aria-hidden="true"></em>&nbsp;Projeto
    </a>
</div>
<div class="itemMenu">
    <a href="/disciplina" style="<?php echo $menu_disciplina?>">
        <em class="fa fa-newspaper-o" aria-hidden="true"></em>&nbsp;Disciplina
    </a>
</div>
<div class="itemMenu">
    <a href="/sala" style="<?php echo $menu_sala?>">
        <em class="fa fa-university" aria-hidden="true"></em>&nbsp;Sala
    </a>
</div>
<div class="itemMenu">
    <a href="/horario" style="<?php echo $menu_horario?>">
        <em class="fa fa-clock-o"></em>&nbsp;Horário
    </a>
</div>
<div class="itemMenu">
    <a href="/presenca" style="<?php echo $menu_presenca?>">
        <em class="fa fa-calendar"></em>&nbsp;Presença
    </a>
</div>
<div class="itemMenu">
    <a href="/frequencia" style="<?php echo $menu_frequencia?>">
        <em class="fa fa-bar-chart"></em>&nbsp;Frequência
    </a>
</div>
<div class="itemMenu">
    <a href="/certificado" style="<?php echo $menu_certificado?>">
        <em class="fa fa-certificate"></em>&nbsp;Certificado
    </a>
</div>
<div class="itemMenu">
    <a href="/configuracao" style="<?php echo $menu_configuracao?>">
        <em class="fa fa-cogs" aria-hidden="true"></em>&nbsp;Configuração
    </a>
</div>