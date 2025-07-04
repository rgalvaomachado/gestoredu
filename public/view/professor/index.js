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

        jsonData.atribuicoes = [];
        const atribuicoesInputs = document.querySelectorAll('input[name="atribuicoes"]');
        atribuicoesInputs.forEach(input => {
            const codSala = input.getAttribute('data-cod_sala');
            const codDisciplina = input.getAttribute('data-cod_disciplina');
            jsonData.atribuicoes.push({
                cod_sala: codSala,
                cod_disciplina: codDisciplina
            });
        });

        apiResponse = apiPost('/usuario', jsonData);

        if (apiResponse.access) {
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = apiResponse.message;
            if(apiResponse.access){
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 3000);
            
        } else {
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 3000);
            }
            window.location.assign("/professor");
        }
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

        jsonData.atribuicoes = [];
        const atribuicoesInputs = document.querySelectorAll('input[name="atribuicoes"]');
        atribuicoesInputs.forEach(input => {
            const codSala = input.getAttribute('data-cod_sala');
            const codDisciplina = input.getAttribute('data-cod_disciplina');
            jsonData.atribuicoes.push({
                cod_sala: codSala,
                cod_disciplina: codDisciplina
            });
        });

        apiResponse = apiPut('/usuario', jsonData);

        if (apiResponse.access) {
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = apiResponse.message;
            if(apiResponse.access){
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 3000);
            
        } else {
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 3000);
            }
            window.location.assign("/professor");
        }
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
                window.location.assign("/professor");
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
            disciplinas.map(({cod_disciplina, nome_disciplina}) => {
                $('#disciplina').append(`
                   <option value="${cod_disciplina}">${nome_disciplina}</option>	
                `);
            });
        }
    });
}

function addAtribuicao(element) {
    let matricula = $(element).parent().parent().parent();

    let cod_sala = null;
    let nome_sala = null;
    const salaSelect = matricula.find('#sala');
    cod_sala = salaSelect.val();
    nome_sala = salaSelect.find("option:selected").text();

    let cod_disciplina = null;
    let nome_disciplina = null;
    const disciplinaSelect = matricula.find('#disciplina');
    cod_disciplina = disciplinaSelect.val();
    nome_disciplina = disciplinaSelect.find("option:selected").text();

    if (!cod_sala || !cod_disciplina) {
        alert('Selecione uma sala e uma disciplina');
    } else {
        $('#atribuicoes').append(`
           <tr>
                <td id=nome_sala>
                    ${nome_sala}
                </td>
                <td id=nome_disciplina>
                    ${nome_disciplina}
                </td>
                <td>
                    <a><i onclick="removeMatricula(this)" class="fa fa-trash" aria-hidden="true"></i></a>
                    
                </td>
                <input type="hidden" id="atribuicoes" name="atribuicoes" data-cod_sala="${cod_sala}" data-cod_disciplina="${cod_disciplina}">
            </tr>
        `);
    }
}

function delAtribuicao(element) {
    let matricula = $(element).parent().parent().parent();
    $(matricula).remove()
}