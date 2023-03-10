function relatorioPresencaAlune(){
    var sala = $("#sala").val();
    var dataInicial = $("#dataInicial").val();
    var dataFinal = $("#dataFinal").val();
    const alert = document.getElementById("messageAlert");
    alert.style.color = "gray";
    alert.innerHTML = "Gerando Relatório...";
    $('#detalhes').hide();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "relatorioPresencaAlune",
            sala: sala,
            dataInicial: dataInicial,
            dataFinal: dataFinal,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText)
            if (response.access) {
                $("#lista").html('');
                alert.innerHTML = "";
                var alunes = response.alunes;
                alunes.map(({nome,presencas,ausencias,justificado,frequencia}) => {
                    var color = (frequencia >= 70 ? "green" : "red");
                    $('#lista').append(`
                        <tr style="color:${color}">
                            <td>${nome}</td>
                            <td>${presencas}</td>
                            <td>${ausencias}</td>
                            <td>${justificado}</td>
                            <td>${frequencia}%</td>
                        </tr>
                    `);
                });
                $('#detalhes').show();
            } else {
                const alert = document.getElementById("messageAlert");
                alert.style.color = "red";
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            } 
            verificaSessão();
        }
    });
}

function relatorioPresencaReuniao(){
    var dataInicial = $("#dataInicial").val();
    var dataFinal = $("#dataFinal").val();
    const alert = document.getElementById("messageAlert");
    alert.style.color = "gray";
    alert.innerHTML = "Gerando Relatório...";
    $('#detalhes').hide();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "relatorioPresencaReuniao",
            dataInicial: dataInicial,
            dataFinal: dataFinal,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText)
            if (response.access) {
                $("#lista").html('');
                alert.innerHTML = "";
                var tutores = response.tutores;
                tutores.map(({nome,presencas,ausencias,justificado,frequencia}) => {
                    var color = (ausencias < 4 ? "green" : "red");
                    $('#lista').append(`
                        <tr style="color:${color}">
                            <td>${nome}</td>
                            <td>${presencas}</td>
                            <td>${ausencias}</td>
                            <td>${justificado}</td>
                        </tr>
                    `);
                });
                $('#detalhes').show();
            } else {
                const alert = document.getElementById("messageAlert");
                alert.style.color = "red";
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            } 
            verificaSessão();
        }
    });
}

function relatorioPresencaMonitore(){
    var sala = $("#sala").val();
    var dataInicial = $("#dataInicial").val();
    var dataFinal = $("#dataFinal").val();
    const alert = document.getElementById("messageAlert");
    alert.style.color = "gray";
    alert.innerHTML = "Gerando Relatório...";
    $('#detalhes').hide();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "relatorioPresencaMonitore",
            sala: sala,
            dataInicial: dataInicial,
            dataFinal: dataFinal,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText)
            if (response.access) {
                $("#lista").html('');
                alert.innerHTML = "";
                var monitores = response.monitores;
                monitores.map(({nome,presencas,ausencias,justificado,frequencia}) => {
                    if(presencas >= 1){
                        $('#lista').append(`
                            <tr>
                                <td>${nome}</td>
                                <td>${presencas}</td>
                            </tr>
                        `);
                    }
                });
                $('#detalhes').show();
            } else {
                const alert = document.getElementById("messageAlert");
                alert.style.color = "red";
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            } 
            verificaSessão();
        }
    });
}

function relatorioPresencaTutore(){
    var sala = $("#sala").val();
    var dataInicial = $("#dataInicial").val();
    var dataFinal = $("#dataFinal").val();
    const alert = document.getElementById("messageAlert");
    alert.style.color = "gray";
    alert.innerHTML = "Gerando Relatório...";
    $('#detalhes').hide();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "relatorioPresencaTutore",
            sala: sala,
            dataInicial: dataInicial,
            dataFinal: dataFinal,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText)
            if (response.access) {
                $("#lista").html('');
                alert.innerHTML = "";
                var tutores = response.tutores;
                tutores.map(({nome,presencas,ausencias,justificado,frequencia}) => {
                    if(presencas >= 1){
                        $('#lista').append(`
                            <tr>
                                <td>${nome}</td>
                                <td>${presencas}</td>
                            </tr>
                        `);
                    }
                });
                $('#detalhes').show();
            } else {
                const alert = document.getElementById("messageAlert");
                alert.style.color = "red";
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            } 
            verificaSessão();
        }
    });
}