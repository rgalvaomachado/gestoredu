function buscarAlunesLista(){
    var sala = $("#sala").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "getAlunesSala",
            sala: sala,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $("#lista").html('');
                var alunes = response.alunes;
                alunes.map(({id,nome}) => {
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
}

function buscarTutoresLista(){
    var sala = $("#sala").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "getTutores",
            sala: sala,
        },
        complete: function(response) {
            var tutores = JSON.parse(response.responseText);
            $("#lista").html('');
            tutores.map(({id,nome}) => {
                $('#lista').append(`
                    <tr>
                        <td>${nome}</td>
                        <td><input name="presente[]" type="checkbox" value='${id}'></td>
                    </tr>
                `);
            });
        }
    });
}

function criarPresencaAlune(){
    var sala = $("#sala").val();
    var data = $("#data").val();
    var aula = $("#aula").val();
    var presente = $('input[name="presente[]"]:checked').map(function () {
        return this.value;
    }).get();

    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "criarPresencaAlune",
            sala: sala,
            data: data,
            aula: aula,
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
                        $("#content").load("view/presenca/alune.html");
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
}

function criarPresencaReuniao(){
    var data = $("#data").val();
    var presente = $('input[name="presente[]"]:checked').map(function () {
        return this.value;
    }).get();

    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "criarPresencaReuniao",
            data: data,
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
                        $("#content").load("view/presenca/reuniao.html");
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
}

function criarPresencaMonitore(){
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
}

function criarPresencaTutore(){
    var sala = $("#sala").val();
    var data = $("#data").val();
    var aula = $("#aula").val();
    var tutore = $("#tutore").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "criarPresencaTutore",
            sala: sala,
            data: data,
            aula: aula,
            tutore: tutore,
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
                        $("#content").load("view/presenca/tutore.html");
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
}