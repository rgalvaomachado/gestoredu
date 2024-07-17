$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();

        var nome = $("#nome").val();
        var data_nascimento = $("#data_nascimento").val();
        var rg = $("#rg").val();
        var cpf = $("#cpf").val();

        var rua = $("#rua").val();
        var numero = $("#numero").val();
        var bairro = $("#bairro").val();
        var cidade = $("#cidade").val();
        var estado = $("#estado").val();

        var telefone = $("#telefone").val();

        var email = $("#email").val();
        var senha = $("#senha").val();

        var cod_projeto = $("#cod_projeto").val();
        var projeto = $("#projeto").val();

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
            url: "/api/usuario",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                nome: nome,
                data_nascimento: data_nascimento,
                rg: rg,
                cpf: cpf,
             
                rua: rua,
                numero: numero,
                bairro: bairro,
                cidade: cidade,
                estado: estado,

                telefone: telefone,
                email: email,
                senha: senha,

                cod_projeto: cod_projeto,
                projeto: projeto,

                grupos: grupos,
                disciplinas: disciplinas,
                salas: salas,
            }),
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
                window.location.assign("/aluno");
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
        
        var rua = $("#rua").val();
        var numero = $("#numero").val();
        var bairro = $("#bairro").val();
        var cidade = $("#cidade").val();
        var estado = $("#estado").val();

        var telefone = $("#telefone").val();

        var email = $("#email").val();
        var senha = $("#senha").val();

        var cod_projeto = $("#cod_projeto").val();
        var projeto = $("#projeto").val();

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
            method: "PUT",
            url: "/api/usuario",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                id: id,
                nome: nome,
                data_nascimento: data_nascimento,
                rg: rg,
                cpf: cpf,
                
                rua: rua,
                numero: numero,
                bairro: bairro,
                cidade: cidade,
                estado: estado,
                
                telefone: telefone,
                email: email,
                senha: senha,
                grupos: grupos,

                cod_projeto: cod_projeto,
                projeto: projeto,

                disciplinas: disciplinas,
                salas: salas,
            }),
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
                window.location.assign("/aluno");
            }
        });
    });

    $('#deletar').submit(function(e) {
        e.preventDefault();
        var usuario = $("#usuario").val();
        $.ajax({
            method: "DELETE",
            url: "/api/usuario",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                id: usuario,
            }),
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
                window.location.assign("/aluno");
            }
        });
    });
});