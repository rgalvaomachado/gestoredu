$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();
        var nome = $("#nome").val();

        var disciplinas = [];
        var disciplina = $("input[name='disciplinas[]']");
        for (var i = 0; i < disciplina.length; i++) {
            if (disciplina[i].checked) {
                disciplinas.push(disciplina[i].value);
            }
        }
        
        $.ajax({
            method: "POST",
            url: "/api/sala",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                nome: nome,
                disciplinas: disciplinas,
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
                window.location.assign("/sala");
            }
        });
    });

    $('#editar').submit(function(e) {
        e.preventDefault();
        var sala = $("#sala").val();
        var nome = $("#nome").val();

        var disciplinas = [];
        var disciplina = $("input[name='disciplinas[]']");
        for (var i = 0; i < disciplina.length; i++) {
            if (disciplina[i].checked) {
                disciplinas.push(disciplina[i].value);
            }
        }
        
        $.ajax({
            method: "PUT",
            url: "/api/sala",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                id: sala,
                nome: nome,
                disciplinas: disciplinas,
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
                window.location.assign("/sala");
            }
        });
    });

    $('#deletar').submit(function(e) {
        e.preventDefault();
        var sala = $("#sala").val();
        $.ajax({
            method: "DELETE",
            url: "/api/sala",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                id: sala,
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
                window.location.assign("/sala");
            }
        });
    });
});