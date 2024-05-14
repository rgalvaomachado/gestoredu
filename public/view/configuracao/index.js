$(document).ready(function() {
    $('#configurar').submit(function(e) {
        e.preventDefault();
        var tipo_frequencia = $("#tipo_frequencia").val();
        var frequencia = $("#frequencia").val();
        $.ajax({
            method: "POST",
            url: "/src/controller/Controller.php",
            data: {
                metodo: "configuracao",
                tipo_frequencia: tipo_frequencia,
                frequencia: frequencia
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
                window.location.assign("../configuracao");
            }
        });
    });
});