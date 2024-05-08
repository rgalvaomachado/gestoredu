$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();
        var nome = $("#nome").val();
        $.ajax({
            method: "POST",
            url: "../src/controller/Controller.php",
            data: {
                metodo: "criarGrupo",
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
                window.location.assign("../grupo/criar.php");
            }
        });
    });

    $('#editar').submit(function(e) {
        e.preventDefault();
        var grupo = $("#grupo").val();
        var nome = $("#nome").val();
        $.ajax({
            method: "POST",
            url: "../src/controller/Controller.php",
            data: {
                metodo: "editarGrupo",
                id: grupo,
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
                window.location.assign("../grupo/editar.php");
            }
        });
    });

    $('#deletar').submit(function(e) {
        e.preventDefault();
        var grupo = $("#grupo").val();
        $.ajax({
            method: "POST",
            url: "../src/controller/Controller.php",
            data: {
                metodo: "deletarGrupo",
                id: grupo,
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
                window.location.assign("../grupo/editar.php");
            }
        });
    });
});

function buscarGrupo(){
    var id = $("#grupo").val();
    $.ajax({
        method: "POST",
        url: "../src/controller/Controller.php",
        data: {
            metodo: "buscarGrupo",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            var grupo = response.grupo
            if(response.access){
                $('#detalhes').show();
                $('#listaUsurios').html('');
                $('#nome').val(grupo.nome);
                grupo.usuarios.map(({id,nome}) => {
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