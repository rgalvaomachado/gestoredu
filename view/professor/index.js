$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();

        var nome = $("#nome").val();
        var data_nascimento = $("#data_nascimento").val();
        var rg = $("#rg").val();
        var cpf = $("#cpf").val();
        var endereco = $("#rua").val()+'###'+$("#numero").val()+'###'+$("#bairro").val()+'###'+$("#cidade").val()+'###'+$("#estado").val();
        var telefone = $("#telefone").val();

        var email = $("#email").val();
        var senha = $("#senha").val();

        var grupos = [];
        grupos.push($("#grupos").val());

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
            url: "../controller/Controller.php",
            data: {
                metodo: "criarUsuario",
                nome: nome,
                data_nascimento: data_nascimento,
                rg: rg,
                cpf: cpf,
                endereco: endereco,
                telefone: telefone,
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
                window.location.assign("../professor/criar.php");
            }
        });
    });

    $('#editar').submit(function(e) {
        e.preventDefault();
        var id = $("#usuario").val();
        var nome = $("#nome").val();
        var data_nascimento = $("#data_nascimento").val();
        var rg = $("#rg").val();
        var cpf = $("#cpf").val();
        var endereco = $("#rua").val()+'###'+$("#numero").val()+'###'+$("#bairro").val()+'###'+$("#cidade").val()+'###'+$("#estado").val();
        var telefone = $("#telefone").val();

        var email = $("#email").val();
        var senha = $("#senha").val();

        var grupos = [];
        grupos.push($("#grupos").val());

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
            url: "../controller/Controller.php",
            data: {
                metodo: "editarUsuario",
                nome: nome,
                id: id,
                data_nascimento: data_nascimento,
                rg: rg,
                cpf: cpf,
                endereco: endereco,
                telefone: telefone,
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
                window.location.assign("../professor/editar.php");
            }
        });
    });

    $('#deletar').submit(function(e) {
        e.preventDefault();
        var usuario = $("#usuario").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
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
                window.location.assign("../professor/editar.php");
            }
        });
    });
});

function buscarUsuario(){
    var id = $("#usuario").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
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
                $('#data_nascimento').val(usuario.data_nascimento);
                $('#rg').val(usuario.rg);
                $('#cpf').val(usuario.cpf);

                var endereco = usuario.endereco.split("###")
                if(endereco[0] != ''){
                    $('#rua').val(endereco[0]);
                }
                if(endereco[1] != ''){
                    $('#numero').val(endereco[1]);
                }
                if(endereco[2] != ''){
                    $('#bairro').val(endereco[2]);
                }
                if(endereco[3] != ''){
                    $('#cidade').val(endereco[3]);
                }
                if(endereco[4] != ''){
                    $('#estado').val(endereco[4]);
                }

                $('#telefone').val(usuario.telefone);
                
                $('#email').val(usuario.email);
                $('#senha').val(usuario.senha);
            } else {
                $('#detalhes').hide();
            }
        }
    });
}