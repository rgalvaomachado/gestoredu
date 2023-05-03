$(document).ready(function() {
    $('#login').submit(function(e) {
        e.preventDefault();
        var email = $("#emailLogin").val();
        var senha = $("#senhaLogin").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
            data: {
                metodo: "login",
                email: email,
                senha: md5(senha),
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                if(response.access){
                    window.location.assign("../home/index.php")
                }else{
                    const alert = document.getElementById("messageAlert");
                    alert.innerHTML = response.message;
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                }
            }
        });
    })
});

function logout(){
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "logout"
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                window.location.assign("../logon/login.php")
            }else{
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}