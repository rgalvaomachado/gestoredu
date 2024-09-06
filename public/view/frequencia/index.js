$(document).ready(function() {
    $('#relatorioChamada').submit(function(e) {
        e.preventDefault();
        var grupo = $("#grupo").val();
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
            url: "/api/relatorio-chamada",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                grupo: grupo,
                disciplina: disciplina,
                sala: sala,
                dataInicial: dataInicial,
                dataFinal: dataFinal,
            }),
            complete: function(response) {
                var response = JSON.parse(response.responseText)
                if (response.access) {
                    $("#lista").html('');
                    alert.innerHTML = "";
                    var usuarios = response.usuarios;
                    usuarios.map(({id, nome,presencas,ausencias,justificado,frequencia, aprovado}) => {
                        var color = (aprovado ? "green" : "red");
                        var hidden = (aprovado ? "" : "hidden");
                        $('#lista').append(`
                            <tr style="color:${color}">
                                <td>${nome}</td>
                                <td>${presencas}</td>
                                <td>${ausencias}</td>
                                <td>${frequencia.toFixed(2)}%</td>
                                <td>
                                    <a href="/frequencia/certificado?id=${id}&frequencia=${frequencia.toFixed(2)}&disciplina=${disciplina}" target="_blank" ${hidden}>
                                        <em class="fa fa-file-pdf-o" aria-hidden="true"></em>
                                    </a>
                                </td>
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