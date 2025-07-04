$(document).ready(function() {
    $('#criarChamadaListada').submit(function(e) {
        e.preventDefault();
        grupo = $("#grupo").val();
        var sala = $("#sala").val();
        var data = $("#data").val();
        var disciplina = $("#disciplina").val();
        var presente = $('input[name="presente[]"]:checked').map(function () {
            return this.value;
        }).get();
    
        $.ajax({
            method: "POST",
            url: "/api/presenca-listada",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                grupo: grupo,
                sala: sala,
                data: data,
                disciplina: disciplina,
                "presente[]": presente,
                
            }),
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                $('html, body').animate({scrollTop:0}, 'slow');
                if (response.access) {
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                    window.location.assign("/presenca/listada");
                } else {
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                }
            }
        });
    });

    $('#criarChamadaIndividual').submit(function(e) {
        e.preventDefault();
        var usuario = $("#usuario").val();
        var grupo = $("#grupo").val();
        var sala = $("#sala").val();
        var disciplina = $("#disciplina").val();
        var data = $("#data").val();
        var presente = $("#presente").val();

        $.ajax({
            method: "POST",
            url: "/api/presenca-individual",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                usuario: usuario,
                grupo: grupo,
                sala: sala,
                disciplina: disciplina,
                data: data,
                presente: presente,
            }),
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                if (response.access) {
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                        $(function(){
                            window.location.assign("/presenca/individual");
                        });
                    }, 2000);
                } else {
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                }
            }
        });
    });
});

function getDisciplinas() {
    cod_sala = $("#sala").val();
    if (cod_sala) {
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
                $('#disciplina').append(`
                    <option value="">Selecione uma disciplina</option>	
                 `);
                disciplinas.map(({cod_disciplina, nome_disciplina}) => {
                    $('#disciplina').append(`
                       <option value="${cod_disciplina}">${nome_disciplina}</option>	
                    `);
                });
            }
        });
    } else {
        $("#criarChamadaIndividual").hide();
        $("#criarChamadaListada").hide();
        $("#disciplina").html('');
        $('#disciplina').append(`
            <option value="">Selecione uma disciplina</option>	
        `);
    }
  
}

function getMatriculasIndividual() {
    cod_sala = $("#sala").val();
    cod_disciplina = $("#disciplina").val();
    if (cod_sala && cod_disciplina){
        apiResponse = apiGet('/matriculas', {
            'sala': cod_sala,
            'disciplina': cod_disciplina,
        })

        if (apiResponse.access) {
             $("#criarChamadaIndividual").show();
            var matriculas = apiResponse.matriculas;
            $("#usuario").html('');
            $('#usuario').append(`
                <option value="">Selecione um usuário</option>	
                `);
            matriculas.map(({id, nome}) => {
                $('#usuario').append(`
                    <option value="${id}">${nome}</option>	
                `);
            });
        }
    } else {
        $("#criarChamadaIndividual").hide();
        $("#usuario").html('');
        $('#usuario').append(`
              <option value="">Selecione um usuário</option>	
        `);
    }
}

function getMatriculasListada() {
    cod_sala = $("#sala").val();
    cod_disciplina = $("#disciplina").val();
    if (cod_sala && cod_disciplina) {
        apiResponse = apiGet('/matriculas', {
            'sala': cod_sala,
            'disciplina': cod_disciplina,
        })

        if (apiResponse.access) {
            $("#criarChamadaListada").show();
            var matriculas = apiResponse.matriculas;
            $("#lista").html('');
            matriculas.map(({id, nome}) => {
                $('#lista').append(`
                    <tr>
                        <td>${nome}</td>
                        <td><input name="presente[]" type="checkbox" value='${id}'></td>
                    </tr>
                `);
            });
        }
    } else {
        $("#criarChamadaListada").hide();
        $("#lista").html('');
    }
}