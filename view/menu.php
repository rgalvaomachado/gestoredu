<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<ul class="nav menu">
        <?php
            session_start();
            if ($_SESSION['usuario'] == "") {
                session_destroy();
                header('location: index.php');
            }
            if (!isset($_SESSION['CREATED'])) {
                $_SESSION['CREATED'] = time();
            } else if (time() - $_SESSION['CREATED'] > 1800) { // 30 minutos
                $_SESSION['usuario'] =  "";
                $_SESSION['modo'] = "";
                session_destroy();
                header('location: index.php');
            }
            $uri = $_SERVER["REQUEST_URI"];
            $parametros = explode('/',$uri);
            if ($parametros[1] == 'gestoredu') {
                $menu = isset($parametros[2]) ? $parametros[2] : "" ;
            } else {
                $menu = isset($parametros[1]) ? $parametros[1] : "" ;
            }
            $menu = explode('?',$menu);
            $arquivo = $menu[0];
        ?>
        <h1 id="espaco-menu"></h1>
        <?php if($_SESSION['modo'] == "representate") { ?>
            <li class="parent"><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-user-plus" aria-hidden="true"></em> Representante <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>   
            </a>
                <ul class="children collapse <?= $arquivo == 'representante_cadastro.php' || $arquivo == 'representante_editar.php'? "in" : "" ?> " id="sub-item-1">
                    <li><a style=<?= $arquivo == "representante_cadastro.php" ? "background-color:green;" : "" ?> class="" href="representante_cadastro.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                    <li><a style=<?= $arquivo == "representante_editar.php" ? "background-color:green;" : "" ?> class="" href="representante_editar.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                </ul>
            </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "representate") { ?>
            <li class="parent"><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-address-book" aria-hidden="true"></em> Comissão de Faltas  <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse <?= $arquivo == 'comissao_cadastro.php' || $arquivo == 'comissao_editar.php'? "in" : "" ?> " id="sub-item-2">
                    <li><a style=<?= $arquivo == "comissao_cadastro.php" ? "background-color:green;" : "" ?> class="" href="comissao_cadastro.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                    <li><a style=<?= $arquivo == "comissao_editar.php" ? "background-color:green;" : "" ?> class="" href="comissao_editar.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                </ul>
            </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "representate") { ?>
            <li class="parent"><a data-toggle="collapse" href="#sub-item-3">
                <em class="fa fa-user-circle-o" aria-hidden="true"></em> Monitore <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse <?= $arquivo == 'monitore_cadastro.php' || $arquivo == 'monitore_editar.php' || $arquivo == 'monitore_editar_presenca.php' ? "in" : "" ?> " id="sub-item-3">
                    <li><a style=<?= $arquivo == "monitore_cadastro.php" ? "background-color:green;" : "" ?> class="" href="monitore_cadastro.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                    <li><a style=<?= $arquivo == "monitore_editar.php" ? "background-color:green;" : "" ?> class="" href="monitore_editar.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                    <li><a style=<?= $arquivo == "monitore_editar_presenca.php" ? "background-color:green;" : "" ?> class="" href="monitore_editar_presenca.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar Presença
                    </a></li>
                </ul>
            </li>
        <?php } ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
            <em class="fa fa-user-o" aria-hidden="true">&nbsp;</em> Tutore <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'tutore_cadastro.php' || $arquivo == 'tutore_editar.php' || $arquivo == 'tutore_justificar_presenca.php' || $arquivo == 'tutore_editar_presenca.php'? "in" : "" ?> " id="sub-item-4">
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "tutore_cadastro.php" ? "background-color:green;" : "" ?> class="" href="tutore_cadastro.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "tutore_editar.php" ? "background-color:green;" : "" ?> class="" href="tutore_editar.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "comissao") { ?>
                    <li><a style=<?= $arquivo == "tutore_justificar_presenca.php" ? "background-color:green;" : "" ?> class="" href="tutore_justificar_presenca.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Justificar Presença
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "tutore_editar_presenca.php" ? "background-color:green;" : "" ?> class="" href="tutore_editar_presenca.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar Presença
                    </a></li>
                <?php } ?>
            </ul>
        </li>
        <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-5">
            <em class="fa fa-graduation-cap" aria-hidden="true">&nbsp;</em> Alune <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'alune_cadastro.php' || $arquivo == 'alune_editar.php' || $arquivo == 'alune_justificar_presenca.php' ? "in" : "" ?>" id="sub-item-5">
                <li><a style=<?= $arquivo == "alune_cadastro.php" ? "background-color:green;" : "" ?> class="" href="alune_cadastro.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "alune_editar.php" ? "background-color:green;" : "" ?> class="" href="alune_editar.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
                <li><a style=<?= $arquivo == "alune_justificar_presenca.php" ? "background-color:green;" : "" ?> class="" href="alune_justificar_presenca.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Justificar Presença
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-6">
            <em class="fa fa-newspaper-o" aria-hidden="true">&nbsp;</em> Disciplina <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'disciplina_cadastro.php' || $arquivo == 'disciplina_editar.php'? "in" : "" ?>" id="sub-item-6">
                <li><a style=<?= $arquivo == "disciplina_cadastro.php" ? "background-color:green;" : "" ?> class="" href="disciplina_cadastro.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "disciplina_editar.php" ? "background-color:green;" : "" ?> class="" href="disciplina_editar.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-7">
            <em class="fa fa-university" aria-hidden="true">&nbsp;</em> Sala <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'sala_cadastro.php' || $arquivo == 'sala_editar.php'? "in" : "" ?>" id="sub-item-7">
                <li><a style=<?= $arquivo == "sala_cadastro.php" ? "background-color:green;" : "" ?> class="" href="sala_cadastro.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "sala_editar.php" ? "background-color:green;" : "" ?> class="" href="sala_editar.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-8">
            <em class="fa fa-calendar">&nbsp;</em> Presença <span data-toggle="collapse" href="#sub-item-6" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'presenca_cadastro_alune.php' || $arquivo == 'presenca_cadastro_tutore.php' || $arquivo == 'presenca_cadastro_monitore.php' || $arquivo == 'presenca_cadastro_reuniao.php' ? "in" : "" ?>" id="sub-item-8">
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "presenca_cadastro_alune.php" ? "background-color:green;" : "" ?> class="" href="presenca_cadastro_alune.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Aula Alune
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "presenca_cadastro_tutore.php" ? "background-color:green;" : "" ?> class="" href="presenca_cadastro_tutore.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Aula Tutore
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate") { ?>
                    <li><a style=<?= $arquivo == "presenca_cadastro_monitore.php" ? "background-color:green;" : "" ?> class="" href="presenca_cadastro_monitore.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Monitoria
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "comissao") { ?>
                    <li><a style=<?= $arquivo == "presenca_cadastro_reuniao.php" ? "background-color:green;" : "" ?> class="" href="presenca_cadastro_reuniao.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Reunião
                    </a></li>
                <?php } ?>
            </ul>
        </li>
        <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-9">
            <em class="fa fa-file-pdf-o">&nbsp;</em> Certificado <span data-toggle="collapse" href="#sub-item-7" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'certificado_tutore.php' || $arquivo == 'certificado_monitore.php'? "in" : "" ?>" id="sub-item-9">
                <li><a style=<?= $arquivo == "certificado_tutore.php" ? "background-color:green;" : "" ?> class="" href="certificado_tutore.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Tutore
                </a></li>
                <li><a style=<?= $arquivo == "certificado_monitore.php" ? "background-color:green;" : "" ?> class="" href="certificado_monitore.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Monitore
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-10">
            <em class="fa fa-bar-chart">&nbsp;</em> Relatorio <span data-toggle="collapse" href="#sub-item-8" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'relatorio_alune.php' || $arquivo == 'relatorio_reuniao.php' || $arquivo == 'relatorio_monitore.php' || $arquivo == 'relatorio_tutore.php' ? "in" : "" ?>" id="sub-item-10">
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                <li><a style=<?= $arquivo == "relatorio_alune.php" ? "background-color:green;" : "" ?> class="" href="relatorio_alune.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Presença Alune
                </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "comissao") { ?>
                    <li><a style=<?= $arquivo == "relatorio_reuniao.php" ? "background-color:green;" : "" ?> class="" href="relatorio_reuniao.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Precença Reunião
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate") { ?>
                    <li><a style=<?= $arquivo == "relatorio_monitore.php" ? "background-color:green;" : "" ?> class="" href="relatorio_monitore.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Presença Monitore
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                <li><a style=<?= $arquivo == "relatorio_tutore.php" ? "background-color:green;" : "" ?> class="" href="relatorio_tutore.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Presença Tutore
                </a></li>
                <?php } ?>
            </ul>
        </li>
        <li><a onclick="logout()"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div>
<script src="public/js/login.js"></script>