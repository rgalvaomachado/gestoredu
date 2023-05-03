$(document).ready(function() {
    $('#buscar').submit(function(e) {
        e.preventDefault();
        sala = $("#sala").val();
        disciplina = $("#disciplina").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
            data: {
                metodo: "buscarUsuarios",
                sala: sala,
                disciplina: disciplina,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                if(response.access){
                    $('#detalhes').show();
                    $("#lista").html('');
                    var usuarios = response.usuarios;
                    usuarios.map(({id,nome}) => {
                        $('#lista').append(`
                            <tr>
                                <td>${nome}</td>
                                <td><input name="presente[]" type="checkbox" value='${id}'></td>
                            </tr>
                        `);
                    });
                }
            }
        });
    });

    $('#criarChamada').submit(function(e) {
        e.preventDefault();
        var sala = $("#sala").val();
        var data = $("#data").val();
        var disciplina = $("#disciplina").val();
        var presente = $('input[name="presente[]"]:checked').map(function () {
            return this.value;
        }).get();
    
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
            data: {
                metodo: "criarPresencaChamada",
                sala: sala,
                data: data,
                disciplina: disciplina,
                "presente[]": presente,
                
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                $('html, body').animate({scrollTop:0}, 'slow');
                if (response.access) {
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                        $(function(){
                            $("#content").load("presenca/chamada.php");
                        });
                    }, 2000);
                    
                } else {
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                }
                verificaSessão();
            }
            
        });
    });

    $('#criarPonto').submit(function(e) {
        e.preventDefault();
        var monitore = $("#monitore").val();
        var sala = $("#sala").val();
        var data = $("#data").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
            data: {
                metodo: "criarPresencaMonitore",
                monitore: monitore,
                sala: sala,
                data: data,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                if (response.access) {
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                        $(function(){
                            $("#content").load("view/presenca/monitore.html");
                        });
                    }, 2000);
                } else {
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                }
                verificaSessão();
            }
        });
    });
});