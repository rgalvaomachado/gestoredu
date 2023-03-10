function criarTutore(){
    var nome = $("#nome").val();
    var disciplina = $("#disciplina").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "criarTutore",
            nome: nome,
            disciplina: disciplina,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if(response.access){
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("view/tutore/criar.html");
                    });
                }, 1000);
            }else{
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
            verificaSessão();
        }
    });
}

function buscarTutore(){
    var id = $("#tutore").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "getTutore",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $('#nome').val(response.tutore.nome);
                $('#disciplina').val(response.tutore.cod_disciplina);
            }
        }
    });
}

function editarTutore(){
    var id = $("#tutore").val();
    var nome = $("#nome").val();
    var disciplina = $("#disciplina").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "salvarTutore",
            id: id,
            nome: nome,
            disciplina: disciplina,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if(response.access){
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("view/tutore/editar.html");
                    });
                }, 1000);
            }else{
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
            verificaSessão();
        }
    });
}

function excluirTutore(){
    if (confirm("Voce realmente deseja excluir?")){
        var id = $("#tutore").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
            data: {
                metodo: "excluirTutore",
                id: id,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                if(response.access){
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                        $(function(){
                            $("#content").load("view/tutore/editar.html");
                        });
                    }, 1000);
                }else{
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                }
                verificaSessão();
            }
        });
    }
}

function buscarTutores(){
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "getTutores",
        },
        complete: function(response) {
            var tutores = JSON.parse(response.responseText);
            tutores.map(({id,nome}) => {
                $('#tutore').append(`<option value='${id}'>${nome}</option>`);
            });
           
        }
    });
}

function buscarPresencaTutore(){
    var tutore = $("#tutore").val();
    var sala = $("#sala").val();
    var aula = $("#aula").val();
    var data = $("#data").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "buscarPresencaTutore",
            tutore: tutore,
            sala: sala,
            aula: aula,
            data: data,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if (response.access) {
                $('#detalhes').show();
                $('#presente').val(response.presente);
            } else {
                $('#detalhes').hide();
                const alert = document.getElementById("messageAlert");
                alert.style.color = "red";
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}

function editarPresencaTutore(){
    var tutore = $("#tutore").val();
    var sala = $("#sala").val();
    var aula = $("#aula").val();
    var data = $("#data").val();
    var presente = $("#presente").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "editarPresencaTutore",
            tutore: tutore,
            sala: sala,
            aula: aula,
            data: data,
            presente: presente,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if (response.access) {
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("view/tutore/presenca.html");
                    });
                }, 2000);
            } else {
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
            verificaSessão();
        }
    });
}

function buscarPresencaReuniao(){
    var tutore = $("#tutore").val();
    var data = $("#data").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "buscarPresencaReuniao",
            tutore: tutore,
            data: data,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if (response.access) {
                $('#detalhes').show();
                $('#presente').val(response.presente);
            } else {
                $('#detalhes').hide();
                const alert = document.getElementById("messageAlert");
                alert.style.color = "red";
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}

function justificarPresencaReuniao(){
    var tutore = $("#tutore").val();
    var data = $("#data").val();
    var presente = $("#presente").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "justificarPresencaReuniao",
            tutore: tutore,
            data: data,
            presente: presente,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if (response.access) {
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("view/tutore/justificar.html");
                    });
                }, 2000);
            } else {
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
            verificaSessão();
        }
    });
}