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
        alert.innerHTML = "Buscando Alunos...";
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
                    $("#usuario").html('');
                    alert.innerHTML = "";
                    var usuarios = response.usuarios;
                    usuarios.map(({id,nome,frequencia, aprovado}) => {
                        $('#usuario').append(`
                            <option value="${id}" data-nome="${nome}" data-frequencia="${frequencia}" data-aprovado="${aprovado}">${nome}</option>
                        `);
                    });
                    $('#gerarCertificado').show();
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
    $('#gerarCertificado').submit(function(e) {
        e.preventDefault();
        var id = $("#usuario").val();
        var nome = $('#usuario :selected').data('nome');
        var frequencia = $('#usuario :selected').data('frequencia');
        var aprovado = $('#usuario :selected').data('aprovado');
        const alert = document.getElementById("messageAlert");
        alert.style.color = "gray";
        alert.innerHTML = "Gerando Certificado...";
        $('#detalhes').hide();
        $.ajax({
            method: "POST",
            url: "/src/controller/Controller.php",
            data: {
                metodo: "gerarCertificado",
                id: id,
                nome: nome,
                frequencia: frequencia,
                aprovado: aprovado,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText)
                if (response.access) {    
                    alert.innerHTML = "";
                    $('#certificado').attr('src',response.path);
                    $('#baixarCertificado').show();
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