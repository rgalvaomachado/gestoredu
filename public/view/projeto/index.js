$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();
        var nome = $("#nome").val();
        $.ajax({
            method: "POST",
            url: "/api/projeto",
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
                window.location.assign("/projeto");
            }
        });
    });

    $('#editar').submit(function(e) {
        e.preventDefault();
        var projeto = $("#projeto").val();
        var nome = $("#nome").val();
        $.ajax({
            method: "PUT",
            url: "/api/projeto",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                id: projeto,
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
                window.location.assign("/projeto");
            }
        });
    });

    $('#deletar').submit(function(e) {
        e.preventDefault();
        var projeto = $("#projeto").val();
        $.ajax({
            method: "DELETE",
            url: "/api/projeto",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                id: projeto,
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
                window.location.assign("/projeto");
            }
        });
    });
});
