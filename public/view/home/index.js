function verificaSessão(){
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
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
        url: "../controller/Controller.php",
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