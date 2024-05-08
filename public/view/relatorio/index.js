$(document).ready(function() {
    $('#relatorioChamada').submit(function(e) {
        e.preventDefault();
        var grupo = $("#grupos").val();
        var disciplina = $("#disciplina").val();
        var sala = $("#sala").val();
        var dataInicial = $("#dataInicial").val();
        var dataFinal = $("#dataFinal").val();
        const alert = document.getElementById("messageAlert");
        alert.style.color = "gray";
        alert.innerHTML = "Gerando Relatório...";
        $('#detalhes').hide();
        $.ajax({
            method: "POST",
            url: "/src/controller/Controller.php",
            data: {
                metodo: "relatorioChamada",
                grupo: grupo,
                disciplina: disciplina,
                sala: sala,
                dataInicial: dataInicial,
                dataFinal: dataFinal,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText)
                if (response.access) {
                    $("#lista").html('');
                    alert.innerHTML = "";
                    var usuarios = response.usuarios;
                    usuarios.map(({nome,presencas,ausencias,justificado,frequencia}) => {
                        var color = (frequencia >= 70 ? "green" : "red");
                        $('#lista').append(`
                            <tr style="color:${color}">
                                <td>${nome}</td>
                                <td>${presencas}</td>
                                <td>${ausencias}</td>
                                <td>${frequencia.toFixed(2)}%</td>
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
            }
        });
    })
});