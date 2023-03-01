function buscarTutore(){
    var id = $("#tutore").val();
    $.ajax({
        method: "POST",
        url: "controller/controller.php",
        data: {
            metodo: "certificadoGetTutore",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('.nomeTutore').html(response.tutore.nome);
                $('.nomeMateria').html("Professor(a) de "+response.tutore.nome_disciplina);
            }
        }
    });
}

function buscarTutores(){
    $.ajax({
        method: "POST",
        url: "controller/controller.php",
        data: {
            metodo: "certificadoGetTutores",
        },
        complete: function(response) {
            var tutores = JSON.parse(response.responseText);
            tutores.map(({id,nome}) => {
                $('#tutore').append(`<option value='${id}'>${nome}</option>`);
            });
        }
    });
}

function buscarRepresentantes(){
    $.ajax({
        method: "POST",
        url: "controller/controller.php",
        data: {
            metodo: "certificadoGetRepresentantes",
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

function buscarMonitores(){
    $.ajax({
        method: "POST",
        url: "controller/controller.php",
        data: {
            metodo: "certificadoGetMonitores",
        },
        complete: function(response) {
            var monitores = JSON.parse(response.responseText);
            monitores.map(({id,nome}) => {
                $('#monitore').append(`<option value='${id}'>${nome}</option>`);
            });
        }
    });
}

function buscarMonitore(){
    var id = $("#monitore").val();
    $.ajax({
        method: "POST",
        url: "controller/controller.php",
        data: {
            metodo: "certificadoGetMonitore",
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

function gerarCertificadoTutore(){
    var tutore = $('#tutore').val();
    var dataInicial = $('#dataInicial').val();
    var dataFinal = $('#dataFinal').val();
    $.ajax({
        method: "POST",
        url: "controller/controller.php",
        data: {
            metodo: "certificadoTutore",
            tutore: tutore,
            dataInicial: dataInicial,
            dataFinal: dataFinal,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                presencaAulas = response.presencaAulas*2;
                presencaReuniao = response.presencaReuniao*1.5;
                presencaAdminsitrativa = $('#horasAdministrativa').val();
                presencaTotal = presencaAulas+presencaReuniao+parseInt(presencaAdminsitrativa);
                $('#detalhes').show();
                $('.anoFinal').html(response.anoFinal);
                $('.mesFinal').html(response.mesFinal);
                $('.mesInicial').html(response.mesInicial);
                $('.presencaAulas').html(' '+presencaAulas +' horas');
                $('.presencaReuniao').html(' '+presencaReuniao +' horas');
                $('.presencaAdministrativa').html(' '+presencaAdminsitrativa +' horas');
                $('.presencaTotal').html(' '+presencaTotal +' horas');
            }else{
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
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
        url: "controller/controller.php",
        data: {
            metodo: "certificadoMonitore",
            monitore: monitore,
            dataInicial: dataInicial,
            dataFinal: dataFinal,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                presencaMonitoria = response.monitoria*4
                $('#detalhes').show();
                $('.anoFinal').html(response.anoFinal);
                $('.mesFinal').html(response.mesFinal);
                $('.mesInicial').html(response.mesInicial);
                $('.presencaMonitorias').html(presencaMonitoria +' horas');
            }else{
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}

function buscarDiscente(){
    var id = $("#discente").val();
    $.ajax({
        method: "POST",
        url: "controller/controller.php",
        data: {
            metodo: "certificadoGetRepresentante",
            id: id
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                var newImage = document.createElement('img');
                newImage.src = "public/assinatura/"+id+".png";
                console.log(newImage.src);
                newImage.style.maxWidth = "100%";
                newImage.style.maxHeight = "100%";
                document.getElementById("assinaturaDiscente").innerHTML = newImage.outerHTML;
                $('#nomeDiscente').html(response.representante.nome);
            }
        }
    });

}

function buscarDocente(){
    var id = $("#docente").val()
    $.ajax({
        method: "POST",
        url: "controller/controller.php",
        data: {
            metodo: "certificadoGetRepresentante",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                var newImage = document.createElement('img');
                newImage.src = "public/assinatura/"+id+".png";
                console.log(newImage.src);
                newImage.style.maxWidth = "100%";
                newImage.style.maxHeight = "100%";
                document.getElementById("assinaturaDocente").innerHTML = newImage.outerHTML;
                $('#nomeDocente').html("Prof. "+response.representante.nome);
            }
        }
    });
}

function downloadVersoTutore(){
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

function downloadFrenteTutore(){
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

function downloadVersoMonitore(){
    var id = $("#monitore").val();
    const alert = document.getElementById("messageAlert");
    if (id > 0){
        var monitore = $('#monitore option[value="'+ id+'"]').html()
        html2canvas(document.getElementById("verso"),{
            allowTaint: true,
            scale:2,
        }).then(function (canvas) {
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);
            anchorTag.download = monitore+" Verso.png";
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

function downloadFrenteMonitore(){
    var id = $("#monitore").val();
    const alert = document.getElementById("messageAlert");
    if (id > 0){
        var monitore = $('#monitore option[value="'+ id+'"]').html()
        html2canvas(document.getElementById("frente"),{
            allowTaint: true,
            scale:2,
        }).then(function (canvas) {
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);
            anchorTag.download = monitore+" Frente.png";
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

// function horasAdministrativa(){
//     horas = $('#horasAdministrativa').val();
    
// }