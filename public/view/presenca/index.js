$(document).ready(function() {
    $('#buscarListagem').submit(function(e) {
        e.preventDefault();
        grupo = $("#grupo").val();
        sala = $("#sala").val();
        disciplina = $("#disciplina").val();
        $.ajax({
            method: "POST",
            url: "/src/controller/Controller.php",
            data: {
                metodo: "buscarUsuarios",
                grupo: grupo,
                disciplina: disciplina,
                sala: sala,
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
            url: "/src/controller/Controller.php",
            data: {
                metodo: "criarPresencaListada",
                grupo: grupo,
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

    $('#buscarIndividual').submit(function(e) {
        e.preventDefault();
        var grupo = $("#grupo").val();
        var sala = $("#sala").val();
        var disciplina = $("#disciplina").val();
        var usuario = $("#disciplina").val();
        $.ajax({
            method: "POST",
            url: "/src/controller/Controller.php",
            data: {
                metodo: "buscarUsuarios",
                grupo: grupo,
                disciplina: disciplina,
                sala: sala,
                usuario: usuario,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                if(response.access){
                    $('#detalhes').show();
                    $("#usuario").html('');
                    var usuarios = response.usuarios;
                    usuarios.map(({id,nome}) => {
                        $('#usuario').append(`
                            <option value="${id}">${nome}</option>	   
                        `);
                    });
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
        $.ajax({
            method: "POST",
            url: "/src/controller/Controller.php",
            data: {
                metodo: "criarPresencaInvidual",
                usuario: usuario,
                grupo: grupo,
                sala: sala,
                disciplina: disciplina,
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