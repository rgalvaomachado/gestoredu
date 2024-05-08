$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();
        var nome = $("#nome").val();
        var email = $("#email").val();
        var senha = $("#senha").val();
        var grupos = [];
        var grupo = $("input[name='grupos[]']");
        for (var i = 0; i < grupo.length; i++) {
            if (grupo[i].checked) {
                grupos.push(grupo[i].value);
            }
        }
        var disciplinas = [];
        var disciplina = $("input[name='disciplinas[]']");
        for (var i = 0; i < disciplina.length; i++) {
            if (disciplina[i].checked) {
                disciplinas.push(disciplina[i].value);
            }
        }
        var salas = [];
        var sala = $("input[name='salas[]']");
        for (var i = 0; i < sala.length; i++) {
            if (sala[i].checked) {
                salas.push(sala[i].value);
            }
        }
        $.ajax({
            method: "POST",
            url: "../src/controller/Controller.php",
            data: {
                metodo: "criarUsuario",
                nome: nome,
                email: email,
                senha: senha,
                grupos: grupos,
                disciplinas: disciplinas,
                salas: salas,
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
                window.location.assign("../usuario/criar.php");
            }
        });
    });

    $('#editar').submit(function(e) {
        e.preventDefault();
        var usuario = $("#usuario").val();
        var nome = $("#nome").val();
        var email = $("#email").val();
        var senha = $("#senha").val();
        var grupos = [];
        var grupo = $("input[name='grupos[]']");
        for (var i = 0; i < grupo.length; i++) {
            if (grupo[i].checked) {
                grupos.push(grupo[i].value);
            }
        }
        var disciplinas = [];
        var disciplina = $("input[name='disciplinas[]']");
        for (var i = 0; i < disciplina.length; i++) {
            if (disciplina[i].checked) {
                disciplinas.push(disciplina[i].value);
            }
        }
        var salas = [];
        var sala = $("input[name='salas[]']");
        for (var i = 0; i < sala.length; i++) {
            if (sala[i].checked) {
                salas.push(sala[i].value);
            }
        }
        $.ajax({
            method: "POST",
            url: "../src/controller/Controller.php",
            data: {
                metodo: "editarUsuario",
                nome: nome,
                id: usuario,
                email: email,
                senha: senha,
                grupos: grupos,
                disciplinas: disciplinas,
                salas: salas,
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
                window.location.assign("../usuario/editar.php");
            }
        });
    });

    $('#deletar').submit(function(e) {
        e.preventDefault();
        var usuario = $("#usuario").val();
        $.ajax({
            method: "POST",
            url: "../src/controller/Controller.php",
            data: {
                metodo: "deletarUsuario",
                id: usuario,
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
                window.location.assign("../usuario/editar.php");
            }
        });
    });
});

function buscarUsuario(){
    var id = $("#usuario").val();
    $.ajax({
        method: "POST",
        url: "../src/controller/Controller.php",
        data: {
            metodo: "buscarUsuario",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                var usuario = response.usuario;
                var grupos = usuario.grupos;
                if (grupos){
                    var grupos = grupos.split("#")
                    var grupo = $("input[name='grupos[]']");
                    for (var i = 0; i < grupo.length; i++) {
                        if (grupos.includes(grupo[i].value)) {
                            $(grupo[i]).prop('checked',true)
                        } else {
                            $(grupo[i]).prop('checked',false)
                        }
                    }
                }
                var disciplinas = usuario.disciplinas;
                if (disciplinas){
                    var disciplinas = disciplinas.split("#")
                    var disciplina = $("input[name='disciplinas[]']");
                    for (var i = 0; i < disciplina.length; i++) {
                        if (disciplinas.includes(disciplina[i].value)) {
                            $(disciplina[i]).prop('checked',true)
                        } else {
                            $(disciplina[i]).prop('checked',false)
                        }
                    }
                }
                var salas = usuario.salas;
                if (salas){
                    var salas = salas.split("#")
                    var sala = $("input[name='salas[]']");
                    for (var i = 0; i < sala.length; i++) {
                        if (salas.includes(sala[i].value)) {
                            $(sala[i]).prop('checked',true)
                        } else {
                            $(sala[i]).prop('checked',false)
                        }
                    }
                }
                $('#nome').val(usuario.nome);
                $('#email').val(usuario.email);
                $('#senha').val(usuario.senha);
            } else {
                $('#detalhes').hide();
            }
        }
    });
}

// function criarRepresentante(){
    
// }

// function editarRepresentante(){
//     var id = $("#representante").val();
//     var nome = $("#nome").val();
//     var usuario = $("#usuario").val();
//     var senha = $("#senha").val();
//     var filesSelected = document.getElementById("assinatura").files;
//     $.ajax({
//         method: "POST",
//         url: "../src/controller/Controller.php",
//         data: {
//             metodo: "salvarRepresentante",
//             id: id,
//             nome: nome,
//             usuario: usuario,
//             senha: senha,
//         },
//         complete: function(response) {
//             var response = JSON.parse(response.responseText);
//             const alert = document.getElementById("messageAlert");
//             alert.innerHTML = response.message;
//             if(response.access){
//                 if (filesSelected.length > 0) {
//                     var fileToLoad = filesSelected[0];
//                     var fileReader = new FileReader();
//                     fileReader.onload = function(fileLoadedEvent) {
//                         var assinatura = fileLoadedEvent.target.result
//                         $.ajax({
//                             method: "POST",
//                             url: "../src/controller/Controller.php",
//                             data: {
//                                 metodo: "salvaAssinaturaRepresentante",
//                                 assinatura: assinatura,
//                                 id: id,
//                             }
//                         });
//                     }
//                     fileReader.readAsDataURL(fileToLoad);
//                 }
//                 alert.style.color = "green";
//                 setTimeout(function(){
//                     alert.innerHTML = "";
//                     $(function(){
//                         $("#content").load("view/representante/editar.html");
//                     });
//                 }, 1000);
//             }else{
//                 alert.style.color = "red";
//                 setTimeout(function(){
//                     alert.innerHTML = "";
//                 }, 2000);
//             }
//             verificaSessão();
//         }
//     });
// }

// function excluirRepresentante(){
//     if (confirm("Voce realmente deseja excluir?")){
//         var id = $("#representante").val();
//         $.ajax({
//             method: "POST",
//             url: "../src/controller/Controller.php",
//             data: {
//                 metodo: "excluirRepresentante",
//                 id: id,
//             },
//             complete: function(response) {
//                 var response = JSON.parse(response.responseText);
//                 const alert = document.getElementById("messageAlert");
//                 alert.innerHTML = response.message;
//                 setTimeout(function(){
//                     alert.innerHTML = "";
//                 }, 3000);
//                 if(response.access){
//                     alert.style.color = "green";
//                     setTimeout(function(){
//                         alert.innerHTML = "";
//                         $(function(){
//                             $("#content").load("view/representante/editar.html");
//                         });
//                     }, 1000);
//                 }else{
//                     alert.style.color = "red";
//                     setTimeout(function(){
//                         alert.innerHTML = "";
//                     }, 2000);
//                 }
//                 verificaSessão();
//             }
//         });
//     }
// }