$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        var jsonData = {};

        formData.forEach((value, key) => {
            jsonData[key] = value.trim() ? value : null;
        });

        jsonData.disciplinas = [];
        const disciplinasInputs = document.querySelectorAll('input[name="disciplinas"]:checked');
        disciplinasInputs.forEach(input => {
            const cod_disciplina = input.getAttribute('data-cod_disciplina');
            jsonData.disciplinas.push({
                cod_disciplina: cod_disciplina,
            });
        })
        
        $.ajax({
            method: "POST",
            url: "/api/sala",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify(jsonData),
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
        var formData = new FormData(this);
        var jsonData = {};

        formData.forEach((value, key) => {
            jsonData[key] = value.trim() ? value : null;
        });

        jsonData.disciplinas = [];
        const disciplinasInputs = document.querySelectorAll('input[name="disciplinas"]:checked');
        disciplinasInputs.forEach(input => {
            const cod_disciplina = input.getAttribute('data-cod_disciplina');
            jsonData.disciplinas.push({
                cod_disciplina: cod_disciplina,
            });
        })
        
        $.ajax({
            method: "PUT",
            url: "/api/sala",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify(jsonData),
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