function criarAlune(){
    var nome = $("#nome").val();
    var sala = $("#sala").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "criarAlune",
            nome: nome,
            sala: sala,
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
                        $("#content").load("view/alune/criar.html");
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

function buscarAlune(){
    var id = $("#alune").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "getAlune",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $('#nome').val(response.alune.nome);
                $('#sala').val(response.alune.cod_sala);
            }
        }
    });
}

function editarAlune(){
    var id = $("#alune").val();
    var nome = $("#nome").val();
    var sala = $("#sala").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "salvarAlune",
            id: id,
            nome: nome,
            sala: sala,
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
                        $("#content").load("view/alune/editar.html");
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

function excluirAlune(){
    if (confirm("Voce realmente deseja excluir?")){
        var id = $("#alune").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
            data: {
                metodo: "excluirAlune",
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
                            $("#content").load("view/alune/editar.html");
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

function buscarAlunes(){
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "getAlunes",
        },
        complete: function(response) {
            var alunes = JSON.parse(response.responseText);
            alunes.map(({id,nome}) => {
                $('#alune').append(`<option value='${id}'>${nome}</option>`);
            });
           
        }
    });
}

function buscarAlunesSala(){
    var sala = $("#sala").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "getAlunesSala",
            sala: sala,
        },
        complete: function(response) {
            $("#alune").html('');
            console.log('teste');
            var response = JSON.parse(response.responseText);
            var alunes = response.alunes; 
            if(response.access){
                $('#detalhes0').show();
                alunes.map(({id,nome}) => {
                    $('#alune').append(`<option value='${id}'>${nome}</option>`);
                });
            }
        }
    });
}

function buscarPresencaAlune(){
    var sala = $("#sala").val();
    var alune = $("#alune").val();
    var data = $("#data").val();
    var aula = $("#aula").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "buscarPresencaAlune",
            sala: sala,
            alune: alune,
            data: data,
            aula: aula,
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

function justificarPresencaAlune(){
    var alune = $("#alune").val();
    var sala = $("#sala").val();
    var aula = $("#aula").val();
    var data = $("#data").val();
    var presente = $("#presente").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "justificarPresencaAlune",
            alune: alune,
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
                        $("#content").load("view/alune/justificar.php");
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