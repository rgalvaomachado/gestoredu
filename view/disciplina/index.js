$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();
        var nome = $("#nome").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
            data: {
                metodo: "criarDisciplina",
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
                window.location.assign("../disciplina/criar.php");
            }
        });
    });

    $('#editar').submit(function(e) {
        e.preventDefault();
        var disciplina = $("#disciplina").val();
        var nome = $("#nome").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
            data: {
                metodo: "editarDisciplina",
                id: disciplina,
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
                window.location.assign("../disciplina/editar.php");
            }
        });
    });

    $('#deletar').submit(function(e) {
        e.preventDefault();
        var disciplina = $("#disciplina").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
            data: {
                metodo: "deletarDisciplina",
                id: disciplina,
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
                window.location.assign("../disciplina/editar.php");
            }
        });
    });
});

function buscarDisciplina(){
    var id = $("#disciplina").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "buscarDisciplina",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            var disciplina = response.disciplina
            if(response.access){
                $('#detalhes').show();
                $('#listaUsurios').html('');
                $('#nome').val(disciplina.nome);
                disciplina.usuarios.map(({id,nome}) => {
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