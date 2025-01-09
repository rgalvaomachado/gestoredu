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
        
        jsonData.matriculas = [];
        const matriculaInputs = document.querySelectorAll('input[name="matriculas[]"]');
        matriculaInputs.forEach(input => {
            const codSala = input.getAttribute('data-cod_sala');
            const codDisciplina = input.getAttribute('data-cod_disciplina');
            jsonData.matriculas.push({
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

        jsonData.matriculas = [];
        const matriculasInputs = document.querySelectorAll('input[name="matriculas"]');
        matriculasInputs.forEach(input => {
            const codSala = input.getAttribute('data-cod_sala');
            const codDisciplina = input.getAttribute('data-cod_disciplina');
            jsonData.matriculas.push({
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
            console.log(disciplinas);
            disciplinas.map(({cod_disciplina, nome_disciplina}) => {
                $('#disciplina').append(`
                   <option value="${cod_disciplina}">${nome_disciplina}</option>	
                `);
            });
        }
    });
}

function addMatricula(element) {
    let matricula = $(element).parent().parent().parent();

    teste = element.parentElement.parentElement.parentElement;

    console.log(teste) 

    let cod_sala = null;
    let nome_sala = null;
    const salaSelect = matricula.find('#sala');
    cod_sala = salaSelect.val();
    nome_sala = salaSelect.find("option:selected").text();

    let cod_disciplina = null;
    let nome_disciplina = null;

    console.log(matricula);

    const disciplinaSelect = matricula.find('#disciplina');
    cod_disciplina = disciplinaSelect.val();
    nome_disciplina = disciplinaSelect.find("option:selected").text();

    console.log(cod_disciplina);

    if (!cod_sala || !cod_disciplina) {
        alert('Selecione uma sala e uma disciplina');
    } else {
        $('#matriculas').append(`
           <tr>
                <td id=nome_sala>
                    ${nome_sala}
                </td>
                <td id=nome_disciplina>
                    ${nome_disciplina}
                </td>
                <td>
                    <a><i onclick="delMatricula(this)" class="fa fa-trash" aria-hidden="true"></i></a>
                    
                </td>
                <input type="hidden" id="matriculas" name="matriculas" data-cod_sala="${cod_sala}" data-cod_disciplina="${cod_disciplina}">
            </tr>
        `);
    }
}

function delMatricula(element) {
    let matricula = $(element).parent().parent().parent();
    $(matricula).remove()
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