$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const formEntries = {};
        formData.forEach((value, key) => {
            if (formEntries[key]) {
                if (!Array.isArray(formEntries[key])) {
                    formEntries[key] = [formEntries[key]];
                }
                formEntries[key].push(value);
            } else {
                formEntries[key] = value;
            }
        });

        $.ajax({
            method: "POST",
            url: "/api/horario",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify(formEntries),
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
                window.location.assign("/horario");
            }
        });
    });

    $('#editar').submit(function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const formEntries = {};
        formData.forEach((value, key) => {
            if (formEntries[key]) {
                if (!Array.isArray(formEntries[key])) {
                    formEntries[key] = [formEntries[key]];
                }
                formEntries[key].push(value);
            } else {
                formEntries[key] = value;
            }
        });

        $.ajax({
            method: "PUT",
            url: "/api/horario",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify(formEntries),
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
                window.location.assign("/horario");
            }
        });
    });

    $('#deletar').submit(function(e) {
        e.preventDefault();
        var id = $("#id").val();
        $.ajax({
            method: "DELETE",
            url: "/api/horario",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                id: id,
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
                window.location.assign("/horario");
            }
        });
    });
});