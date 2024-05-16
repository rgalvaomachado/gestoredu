$(document).ready(function() {
    $('#login').submit(function(e) {
        e.preventDefault();
        var email = $("#emailLogin").val();
        var senha = $("#senhaLogin").val();
        $.ajax({
            method: "POST",
            url: "/src/controller/Controller.php",
            data: {
                metodo: "login",
                email: email,
                senha: senha,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                if(response.access){
                    window.location.assign("/home")
                }else{
                    $('.error_login').show();
                    const alert = document.getElementById("messageAlert");
                    alert.innerHTML = response.message;
                    setTimeout(function(){
                        alert.innerHTML = "";
                        $('.error_login').hide();
                    }, 2000);
                }
            }
        });
    })
    $('#primeiroLogin').submit(function(e) {
        e.preventDefault();
        var nome = $("#nome").val();
        var email = $("#email").val();
        var senha = $("#senha").val();
        $.ajax({
            method: "POST",
            url: "/src/controller/Controller.php",
            data: {
                metodo: "criarUsuario",
                nome: nome,
                email: email,
                senha: senha,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                if(response.access){
                    window.location.assign("/home")
                }else{
                    $('.error_login').show();
                    const alert = document.getElementById("messageAlert");
                    alert.innerHTML = response.message;
                    setTimeout(function(){
                        alert.innerHTML = "";
                        $('.error_login').hide();
                    }, 2000);
                }
            }
        });
    })
});