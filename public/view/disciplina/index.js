$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();
        var nome = $("#nome").val();
        $.ajax({
            method: "POST",
            url: "/api/disciplina",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                nome: nome,
            }),
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
                window.location.assign("/disciplina");
            }
        });
    });

    $('#editar').submit(function(e) {
        e.preventDefault();
        var disciplina = $("#disciplina").val();
        var nome = $("#nome").val();
        $.ajax({
            method: "PUT",
            url: "/api/disciplina",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                id: disciplina,
                nome: nome
            }),
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
                window.location.assign("/disciplina");
            }
        });
    });

    $('#deletar').submit(function(e) {
        e.preventDefault();
        var disciplina = $("#disciplina").val();
        $.ajax({
            method: "DELETE",
            url: "/api/disciplina",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                id: disciplina,
            }),
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
                window.location.assign("/disciplina");
            }
        });
    });
});
