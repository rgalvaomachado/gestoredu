function verificaSessão(){
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "verificaSessão",
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if (!response.access) {
                window.location.assign("")
            }
        }
    });
}

function verificaPermissao(){
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "verificaLogin",
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if (response.access) {
                if (response.modo == 'representante'){
                    menuRepresentante();
                }
                if (response.modo == 'monitore'){
                    menuMonitore();
                }
                if (response.modo == 'comissao'){
                    menuComissao();
                }
            }
        }
    });
}

function menuRepresentante(){
    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="representanteMenu" class="subMenu"/>
            <label for="representanteMenu">
                <em class="fa fa-user-plus" aria-hidden="true"></em>&nbsp;Representante
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/representante/criar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/representante/editar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="comissaoMenu" class="subMenu"/>
            <label for="comissaoMenu">
                <em class="fa fa-address-book" aria-hidden="true"></em>&nbsp;Comissão
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/comissao/criar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/comissao/editar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="monitoreMenu" class="subMenu"/>
            <label for="monitoreMenu">
                <em class="fa fa-user-circle-o" aria-hidden="true"></em>&nbsp;Monitore
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/monitore/criar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/monitore/editar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/monitore/presenca.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar Presença</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="tutoreMenu" class="subMenu"/>
            <label for="tutoreMenu">
                <em class="fa fa-user-o" aria-hidden="true"></em>&nbsp;Tutore
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/tutore/criar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/tutore/editar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/tutore/presenca.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar Presença</a></li>
                <li><a href="#" onclick=" $(function(){$("#content").load("view/tutore/justificar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Justificar Presença</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="aluneMenu" class="subMenu"/>
            <label for="aluneMenu">
                <em class="fa fa-graduation-cap" aria-hidden="true"></em>&nbsp;Alune
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/alune/criar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/alune/editar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/alune/justificar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Justificar Presença</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="disciplinaMenu" class="subMenu"/>
            <label for="disciplinaMenu">
                <em class="fa fa-newspaper-o" aria-hidden="true"></em>&nbsp;Disciplina
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/disciplina/criar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/disciplina/editar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="salaMenu" class="subMenu"/>
            <label for="salaMenu">
                <em class="fa fa-university" aria-hidden="true"></em>&nbsp;Sala
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/sala/criar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/sala/editar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="presencaMenu" class="subMenu"/>
            <label for="presencaMenu">
                <em class="fa fa-calendar"></em>&nbsp;Presença
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/presenca/alune.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Aula Alune</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/presenca/tutore.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Aula Tutore</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/presenca/monitore.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Monitore</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/presenca/reuniao.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Reunião</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="relatorioMenu" class="subMenu"/>
            <label for="relatorioMenu">
                <em class="fa fa-bar-chart"></em>&nbsp;Relatorio
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/relatorio/alune.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Presença Alune</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/relatorio/reuniao.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Presença Reunião</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/relatorio/monitore.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Presença Monitore</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/relatorio/tutore.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Presença Tutore</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="certificadoMenu" class="subMenu"/>
            <label for="certificadoMenu">
                <em class="fa fa-file-pdf-o"></em>&nbsp;Certificado
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/certificado/tutore.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Tutore</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/certificado/monitore.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Monitore</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="logoutMenu" class="subMenu"/>
            <label onclick="logout()">
                <em class="fa fa-power-off"></em>&nbsp;Logout
            </label>
        </li>
    `);
}

function menuMonitore(){
    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="tutoreMenu" class="subMenu"/>
            <label for="tutoreMenu">
                <em class="fa fa-user-o" aria-hidden="true"></em>&nbsp;Tutore
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/tutore/criar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/tutore/editar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/tutore/presenca.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar Presença</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="aluneMenu" class="subMenu"/>
            <label for="aluneMenu">
                <em class="fa fa-graduation-cap" aria-hidden="true"></em>&nbsp;Alune
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/alune/criar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/alune/editar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/alune/justificar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Justificar Presença</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="disciplinaMenu" class="subMenu"/>
            <label for="disciplinaMenu">
                <em class="fa fa-newspaper-o" aria-hidden="true"></em>&nbsp;Disciplina
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/disciplina/criar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/disciplina/editar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="salaMenu" class="subMenu"/>
            <label for="salaMenu">
                <em class="fa fa-university" aria-hidden="true"></em>&nbsp;Sala
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/sala/criar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/sala/editar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="presencaMenu" class="subMenu"/>
            <label for="presencaMenu">
                <em class="fa fa-calendar"></em>&nbsp;Presença
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/presenca/alune.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Aula Alune</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/presenca/tutore.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Aula Tutore</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="relatorioMenu" class="subMenu"/>
            <label for="relatorioMenu">
                <em class="fa fa-bar-chart"></em>&nbsp;Relatorio
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/relatorio/alune.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Presença Alune</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/relatorio/tutore.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Presença Tutore</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="certificadoMenu" class="subMenu"/>
            <label for="certificadoMenu">
                <em class="fa fa-file-pdf-o"></em>&nbsp;Certificado
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/certificado/tutore.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Tutore</a></li>
                <li><a href="#" onclick='$(function(){$("#content").load("view/certificado/monitore.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Monitore</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="logoutMenu" class="subMenu"/>
            <label onclick="logout()">
                <em class="fa fa-power-off"></em>&nbsp;Logout
            </label>
        </li>
    `);
}

function menuComissao(){
    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="tutoreMenu" class="subMenu"/>
            <label for="tutoreMenu">
                <em class="fa fa-user-o" aria-hidden="true"></em>&nbsp;Tutore
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick=" $(function(){$("#content").load("view/tutore/justificar.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Justificar Presença</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="presencaMenu" class="subMenu"/>
            <label for="presencaMenu">
                <em class="fa fa-calendar"></em>&nbsp;Presença
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/presenca/reuniao.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Reunião</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="relatorioMenu" class="subMenu"/>
            <label for="relatorioMenu">
                <em class="fa fa-bar-chart"></em>&nbsp;Relatorio
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick='$(function(){$("#content").load("view/relatorio/reuniao.html");});menu();'><em class="fa fa-arrow-right">&nbsp;</em>Presença Reunião</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="logoutMenu" class="subMenu"/>
            <label onclick="logout()">
                <em class="fa fa-power-off"></em>&nbsp;Logout
            </label>
        </li>
    `);
}

function menu(){
    checkMenu = $('#checkMenu').is(':checked');
    if (checkMenu){
        $('#menu').hide();
    }else{
        $('#menu').show();
    }
}

function logout(){
    $(function(){
        $.ajax({
            method: "POST",
            url: "controller/Controller.php",
            data: {
                metodo: "logout",
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                if(response.access){
                    window.location.assign("");
                }
            }
        });
    });
}