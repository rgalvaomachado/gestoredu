function verificaSessão(){
    $.ajax({
        method: "POST",
        url: "../src/controller/Controller.php",
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
        url: "../src/controller/Controller.php",
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

function menu(){
    checkMenu = $('#checkMenu').is(':checked');
    if (checkMenu){
        $('#menu').hide();
    }else{
        $('#menu').show();
    }
}

function grafico(professor, aluno){
    const ctx = $('#usuarios');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Professor(a)',
                'Aluno(a)',
            ],
            datasets: [{
                data: [professor, aluno],
                backgroundColor: [
                'rgb(255, 0, 0)',
                'rgb(0, 0, 255)',
                ],
                hoverOffset: 4
            }]
        }
    });
}

function loadSalas(){
    apiResponse = apiGet('/salas')
    if(apiResponse.access){
        qtd = apiResponse.salas.length
        $("#qtdSalas").html(qtd)
    }else{
        $("#qtdSalas").html(0)
    }
}

function loadUsuarios(){
    apiResponse = apiGet('/usuarios')
    if(apiResponse.access){
        qtd = apiResponse.usuarios.length
        $("#qtdUsuarios").html(qtd)
    }else{
        $("#qtdUsuarios").html(0)
    }
}

function loadDisciplinas(){
    apiResponse = apiGet('/disciplinas')
    if(apiResponse.access){
        qtd = apiResponse.disciplinas.length
        $("#qtdDisciplinas").html(qtd)
    }else{
        $("#qtdDisciplinas").html(0)
    }
}

function loadAlunos(){
    apiResponse = apiGet('/usuarios/grupos', {'grupo': '1'})
    if(apiResponse.access){
        qtd = apiResponse.usuarios.length
        $("#qtdAlunos").html(qtd)
    }else{
        $("#qtdAlunos").html(0)
    }
}

function loadProfessores(){
    apiResponse = apiGet('/usuarios/grupos', {'grupo': '2'})
    if(apiResponse.access){
        qtd = apiResponse.usuarios.length
        $("#qtdProfessores").html(qtd)
    }else{
        $("#qtdProfessores").html(0)
    }
}