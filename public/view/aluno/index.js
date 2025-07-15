$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        var jsonData = {};

        formData.forEach((value, key) => {
            jsonData[key] = value.trim() ? value : null;
        });

        jsonData.grupos = [];
        const gruposInputs = document.querySelectorAll('input[name="grupos"]');
        gruposInputs.forEach(input => {
            const codGrupo = input.getAttribute('data-cod_grupo');
            jsonData.grupos.push({
                cod_grupo: codGrupo,
            });
        })
        
        jsonData.inscricoes = [];
        const inscricaoInputs = document.querySelectorAll('input[name="inscricoes[]"]');
        inscricaoInputs.forEach(input => {
            const codSala = input.getAttribute('data-cod_sala');
            const codDisciplina = input.getAttribute('data-cod_disciplina');
            jsonData.inscricoes.push({
                cod_grupo: 1,
                cod_sala: codSala,
                cod_disciplina: codDisciplina
            });
        })

        $.ajax({
            method: "POST",
            url: "/api/usuario",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify(jsonData),
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                if(response.access){
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 3000);
                }else{
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 3000);
                }
                window.location.assign("/aluno");
            }
        });
    });

    $('#editar').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        var jsonData = {};

        formData.forEach((value, key) => {
            jsonData[key] = value.trim() ? value : null;
        });

        jsonData.grupos = [];
        const gruposInputs = document.querySelectorAll('input[name="grupos"]');
        gruposInputs.forEach(input => {
            const codGrupo = input.getAttribute('data-cod_grupo');
            jsonData.grupos.push({
                cod_grupo: codGrupo,
            });
        })

        jsonData.inscricoes = [];
        const inscricoesInputs = document.querySelectorAll('input[name="inscricoes"]');
        inscricoesInputs.forEach(input => {
            const codSala = input.getAttribute('data-cod_sala');
            const codDisciplina = input.getAttribute('data-cod_disciplina');
            jsonData.inscricoes.push({
                cod_grupo: 1,
                cod_sala: codSala,
                cod_disciplina: codDisciplina
            });
        })

        jsonData.projetos = [];
        const projetosInputs = document.querySelectorAll('input[name="projetos"]');
        projetosInputs.forEach(input => {
            const nome = input.getAttribute('data-nome');
            const codSala = input.getAttribute('data-cod_sala');
            const codDisciplina = input.getAttribute('data-cod_disciplina');
            jsonData.projetos.push({
                nome: nome,
                cod_sala: codSala,
                cod_disciplina: codDisciplina
            });
        })

        $.ajax({
            method: "PUT",
            url: "/api/usuario",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify(jsonData),
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                if(response.access){
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 3000);
                }else{
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 3000);
                }
                window.location.assign("/aluno");
            }
        });
    });

    $('#deletar').submit(function(e) {
        e.preventDefault();
        var usuario = $("#usuario").val();
        $.ajax({
            method: "DELETE",
            url: "/api/usuario",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                id: usuario,
            }),
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                if(response.access){
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 3000);
                }else{
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 3000);
                }
                window.location.assign("/aluno");
            }
        });
    });

    $('#buscarPorNome').submit(function(e) {
        e.preventDefault();

        let nome = $('#nome_busca').val()
        apiResponse = apiGet('/usuario/busca-por-nome', {
            'nome': nome,
            'grupo': 1
        });

        if(apiResponse.access){
            $("#lista").html('');
            apiResponse.usuarios.map(({id, nome}) => {
                $('#lista').append(`
                    <tr>
                        <td class="text-left">
                            ${nome}
                        </td>
                        <td>
                            <a href="/aluno/editar?id=${id}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="/aluno/deletar?id=${id}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                `);
            });
        } else {
            $("#lista").html('');
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = apiResponse.message;
            alert.style.color = "red";
            setTimeout(function(){
                alert.innerHTML = "";
            }, 3000);
        }
    });

});

function getDisciplinas() {
    cod_sala = $("#sala").val();
    $.ajax({
        method: "GET",
        url: "/api/sala",
        headers: {
            "Content-Type": "application/json",
        },
        data: {
            id: cod_sala,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            var disciplinas = response.sala.disciplinas;
            $("#disciplina").html('');
            disciplinas.map(({cod_disciplina, nome_disciplina}) => {
                $('#disciplina').append(`
                   <option value="${cod_disciplina}">${nome_disciplina}</option>	
                `);
            });
        }
    });
}

function addInscricao(element) {
    let inscricao = $(element).parent().parent().parent();

    let cod_sala = null;
    let nome_sala = null;
    const salaSelect = inscricao.find('#sala');
    cod_sala = salaSelect.val();
    nome_sala = salaSelect.find("option:selected").text();

    let cod_disciplina = null;
    let nome_disciplina = null;

    const disciplinaSelect = inscricao.find('#disciplina');
    cod_disciplina = disciplinaSelect.val();
    nome_disciplina = disciplinaSelect.find("option:selected").text();

    if (!cod_sala || !cod_disciplina) {
        alert('Selecione uma sala e uma disciplina');
    } else {
        $('#inscricoes').append(`
           <tr>
                <td id=nome_sala>
                    ${nome_sala}
                </td>
                <td id=nome_disciplina>
                    ${nome_disciplina}
                </td>
                <td>
                    <a><i onclick="delInscricao(this)" class="fa fa-trash" aria-hidden="true"></i></a>
                    
                </td>
                <input type="hidden" id="inscricoes" name="inscricoes" data-cod_grupo="${1}" data-cod_sala="${cod_sala}" data-cod_disciplina="${cod_disciplina}">
            </tr>
        `);
    }
}

function delInscricao(element) {
    let inscricao = $(element).parent().parent().parent();
    $(inscricao).remove()
}

function getDisciplinasProjeto() {
    cod_sala = $("#sala_projeto").val();
    $.ajax({
        method: "GET",
        url: "/api/sala",
        headers: {
            "Content-Type": "application/json",
        },
        data: {
            id: cod_sala,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            var disciplinas = response.sala.disciplinas;
            $("#disciplina_projeto").html('');
            disciplinas.map(({cod_disciplina, nome_disciplina}) => {
                $('#disciplina_projeto').append(`
                   <option value="${cod_disciplina}">${nome_disciplina}</option>	
                `);
            });
        }
    });
}

function addProjeto(element) {
    let projeto = $(element).parent().parent().parent();

    teste = element.parentElement.parentElement.parentElement;

    let cod_sala = null;
    let nome_sala = null;
    const salaSelect = projeto.find('#sala_projeto');
    cod_sala = salaSelect.val();
    nome_sala = salaSelect.find("option:selected").text();

    let cod_disciplina = null;
    let nome_disciplina = null;
    const disciplinaSelect = projeto.find('#disciplina_projeto');
    cod_disciplina = disciplinaSelect.val();
    nome_disciplina = disciplinaSelect.find("option:selected").text();

    let nome_projeto = null;
    const nomeProjeto = projeto.find('#nome_projeto');
    nome_projeto = nomeProjeto.val();

    if (!cod_sala || !cod_disciplina || !nome_projeto) {
        alert('Selecione uma nome, sala e disciplina');
    } else {
        $('#projetos').append(`
           <tr>
                <td id=nome_projeto>
                    ${nome_projeto}
                </td>
                <td id=nome_sala>
                    ${nome_sala}
                </td>
                <td id=nome_disciplina>
                    ${nome_disciplina}
                </td>
                <td>
                    <a><i onclick="delProjeto(this)" class="fa fa-trash" aria-hidden="true"></i></a>
                    
                </td>
                <input type="hidden" id="projetos" name="projetos" data-nome="${nome_projeto}" data-cod_sala="${cod_sala}" data-cod_disciplina="${cod_disciplina}">
            </tr>
        `);
    }
}

function delProjeto(element) {
    let projeto = $(element).parent().parent().parent();
    $(projeto).remove()
}

function loadAlunos(){
    apiResponse = apiGet('/usuarios/grupos', {'grupo': '1'})
    if(apiResponse.access){
        $("#lista").html('');
        apiResponse.usuarios.map(({id, nome}) => {
            $('#lista').append(`
                <tr>
                    <td class="text-left">
                        ${nome}
                    </td>
                    <td>
                        <a href="/aluno/editar?id=${id}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>
                    <td>
                        <a href="/aluno/deletar?id=${id}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            `);
        });
    }
}