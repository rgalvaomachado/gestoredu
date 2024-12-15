$(document).ready(function() {
    $('#login').submit(function(e) {
        e.preventDefault();
        var email = $("#emailLogin").val();
        var senha = $("#senhaLogin").val();
        $.ajax({
            method: "POST",
            url: "/api/login",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                "email": email,
                "senha": senha,
            }),
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
        
        var senha = $("#senha").val();
        var senhaConfirmacaoLogin = $("#senhaConfirmacaoLogin").val();

        if (senha != senhaConfirmacaoLogin){
            $('.error_login').show();
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = 'As senhas não são iguais';
            setTimeout(function(){
                alert.innerHTML = "";
                $('.error_login').hide();
            }, 2000);
        } else {
            var nome = $("#nome").val();
            var email = $("#email").val();
            var grupos = [];
            grupos.push($("#grupos").val());
            $.ajax({
                method: "POST",
                url: "/api/primeiro-login",
                headers: {
                    "Content-Type": "application/json",
                },
                data: JSON.stringify({
                    "nome": nome,
                    "email": email,
                    "senha": senha,
                    "grupos": grupos,
                }),
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
        }
    })
});