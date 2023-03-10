function buscarTutoreCertificado(){
    var id = $("#tutore").val();
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "getTutore",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('.nomeTutore').html(response.tutore.nome);
                $('.nomeMateria').html(response.tutore.nome_disciplina);
            }
        }
    });
}

function gerarCertificadoTutore(){
    var tutore = $('#tutore').val();
    var dataInicial = $('#dataInicial').val();
    var dataFinal = $('#dataFinal').val();
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "certificadoTutore",
            tutore: tutore,
            dataInicial: dataInicial,
            dataFinal: dataFinal,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $('.anoFinal').html(response.anoFinal);
                $('.mesFinal').html(response.mesFinal);
                $('.mesInicial').html(response.mesInicial);
                $('.presencaAulas').html(response.presencaAulas*2);
                $('.presencaReuniao').html(response.presencaReuniao);
            }else{
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
            verificaSessão();
        }
    });
}

function buscarMonitoreCertificado(){
    var id = $("#monitore").val();
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "getMonitore",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('.nomeMonitore').html(response.monitore.nome);
            }
        }
    });
}

function gerarCertificadoMonitore(){
    var monitore = $('#monitore').val();
    var dataInicial = $('#dataInicial').val();
    var dataFinal = $('#dataFinal').val();
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "certificadoMonitore",
            monitore: monitore,
            dataInicial: dataInicial,
            dataFinal: dataFinal,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $('.anoFinal').html(response.anoFinal);
                $('.mesFinal').html(response.mesFinal);
                $('.mesInicial').html(response.mesInicial);
                $('.presencaMonitorias').html(response.presencaMonitorias*4);
            }else{
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
            verificaSessão();
        }
    });
}

function buscarDocentesDiscentes(){
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "getRepresentantes",
        },
        complete: function(response) {
            var representantes = JSON.parse(response.responseText);
            representantes.map(({id,nome}) => {
                $('#discente').append(`<option value='${id}'>${nome}</option>`);
                $('#docente').append(`<option value='${id}'>${nome}</option>`);
            });
        }
    });
}

function buscarDiscente(){
    var id = $("#discente").val();
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "getRepresentante",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                var srcData = response.representante.assinatura;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                newImage.style.maxWidth = "100%";
                newImage.style.maxHeight = "100%";
                document.getElementById("assinaturaDiscente").innerHTML = newImage.outerHTML;
            }
        }
    });
}

function buscarDocente(){
    var id = $("#docente").val();
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "getRepresentante",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                var srcData = response.representante.assinatura;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                newImage.style.maxWidth = "100%";
                newImage.style.maxHeight = "100%";
                document.getElementById("assinaturaDocente").innerHTML = newImage.outerHTML;
            }
        }
    });
}

function downloadVerso(){
    var id = $("#tutore").val();
    const alert = document.getElementById("messageAlert");
    if (id > 0){
        var tutore = $('#tutore option[value="'+ id+'"]').html()
        html2canvas(document.getElementById("verso"),{
            allowTaint: true,
            scale:2,
        }).then(function (canvas) {
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);
            anchorTag.download = tutore+" Verso.png";
            anchorTag.href = canvas.toDataURL();
            anchorTag.target = '_blank';
            anchorTag.click();
        });
    } else {
        $('html, body').animate({scrollTop:0}, 'slow');
        alert.style.color = "red";
        alert.innerHTML = "Por favor, ensira todos os dados";
        setTimeout(function(){
            alert.innerHTML = "";
        }, 2000);
    }
}

function downloadFrente(){
    var id = $("#tutore").val();
    const alert = document.getElementById("messageAlert");
    if (id > 0){
        var tutore = $('#tutore option[value="'+ id+'"]').html()
        html2canvas(document.getElementById("frente"),{
            allowTaint: true,
            scale:2,
        }).then(function (canvas) {
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);
            anchorTag.download = tutore+" Frente.png";
            anchorTag.href = canvas.toDataURL();
            anchorTag.target = '_blank';
            anchorTag.click();
        });
    }else{
        $('html, body').animate({scrollTop:0}, 'slow');
        alert.style.color = "red";
        alert.innerHTML = "Por favor, ensira todos os dados";
        setTimeout(function(){
            alert.innerHTML = "";
        }, 2000);
    }
}