function criarSala(){
    var nome = $("#nome").val();
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "criarSala",
            nome: nome,
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
                        $("#content").load("view/sala/criar.html");
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

function buscarSala(){
    var id = $("#sala").val();
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "getSala",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $('#nome').val(response.sala.nome);
            }
        }
    });
}

function editarSala(){
    var id = $("#sala").val();
    var nome = $("#nome").val();
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "salvarSala",
            id: id,
            nome: nome,
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
                        $("#content").load("view/sala/editar.html");
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

function excluirSala(){
    if (confirm("Voce realmente deseja excluir?")){
        var id = $("#sala").val();
        $.ajax({
            method: "POST",
            url: "controller/Controller.php",
            data: {
                metodo: "excluirSala",
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
                            $("#content").load("view/sala/editar.html");
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

function buscarSalas(){
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "getSalas",
        },
        complete: function(response) {
            var salas = JSON.parse(response.responseText);
            salas.map(({id,nome}) => {
                $('#sala').append(`<option value='${id}'>${nome}</option>`);
            });
           
        }
    });
}