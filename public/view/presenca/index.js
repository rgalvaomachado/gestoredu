$(document).ready(function() {
    $('#criarChamadaListada').submit(function(e) {
        e.preventDefault();
        grupo = $("#grupo").val();
        var sala = $("#sala").val();
        var data = $("#data").val();
        var disciplina = $("#disciplina").val();
        var presente = $('input[name="presente[]"]:checked').map(function () {
            return this.value;
        }).get();
    
        $.ajax({
            method: "POST",
            url: "/api/presenca-listada",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                grupo: grupo,
                sala: sala,
                data: data,
                disciplina: disciplina,
                "presente[]": presente,
                
            }),
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                $('html, body').animate({scrollTop:0}, 'slow');
                if (response.access) {
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                    window.location.assign("/presenca/listada");
                } else {
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                }
            }
        });
    });

    $('#criarChamadaIndividual').submit(function(e) {
        e.preventDefault();
        var usuario = $("#usuario").val();
        var grupo = $("#grupo").val();
        var sala = $("#sala").val();
        var disciplina = $("#disciplina").val();
        var data = $("#data").val();
        var presente = $("#presente").val();
        $.ajax({
            method: "POST",
            url: "/api/presenca-individual",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                usuario: usuario,
                grupo: grupo,
                sala: sala,
                disciplina: disciplina,
                data: data,
                presente: presente,
            }),
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                if (response.access) {
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                        $(function(){
                            window.location.assign("/presenca/individual");
                        });
                    }, 2000);
                } else {
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                }
            }
        });
    });
});