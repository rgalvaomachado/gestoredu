$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();
        var nome = $("#nome").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
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
                    }, 3000);
                }else{
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 3000);
                }
                window.location.assign("../sala/criar.php");
            }
        });
    });

    $('#editar').submit(function(e) {
        e.preventDefault();
        var sala = $("#sala").val();
        var nome = $("#nome").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
            data: {
                metodo: "editarSala",
                id: sala,
                nome: nome
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                if(response.access){
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 3000);
                }else{
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 3000);
                }
                window.location.assign("../sala/editar.php");
            }
        });
    });

    $('#deletar').submit(function(e) {
        e.preventDefault();
        var sala = $("#sala").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
            data: {
                metodo: "deletarSala",
                id: sala,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                if(response.access){
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 3000);
                }else{
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 3000);
                }
                window.location.assign("../sala/editar.php");
            }
        });
    });
});

function buscarSala(){
    var id = $("#sala").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "buscarSala",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            var sala = response.sala
            if(response.access){
                $('#detalhes').show();
                $('#listaUsurios').html('');
                $('#nome').val(sala.nome);
                sala.usuarios.map(({id,nome}) => {
                    $('#listaUsurios').append(`
                            <label>`+nome+`</label><br>
                        `);
                });
            } else {
                $('#detalhes').hide();
            }
        }
    });
}