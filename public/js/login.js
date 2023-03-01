function login(){
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();
    $.ajax({
        method: "POST",
        url: "controller/controller.php",
        data: {
            metodo: 'login',
            usuario: usuario,
            senha: md5(senha),
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            window.location.assign(response.redirect);
        }
    });
}

function logout(){
    $.ajax({
        method: "POST",
        url: "controller/controller.php",
        data: {
            metodo: 'logout',
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            window.location.assign(response.redirect);
        }
    });
}