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

        var grupos = [];
        grupos.push($("#grupos").val());

        var salas = [];
        var sala = $("input[name='salas[]']");
        for (var i = 0; i < sala.length; i++) {
            if (sala[i].checked) {
                salas.push(sala[i].value);
            }
        }

        var disciplinasPorSala = {};
        var salaIds = [];
        $("input[name='disciplina[]']").each(function() {
            var salaId = $(this).attr('data-sala-id');
            if (salaIds.indexOf(salaId) === -1) {
                salaIds.push(salaId);
            }
        });
        $("input[name='disciplina[]']:checked").each(function() {
            var salaId = $(this).attr('data-sala-id');
            var disciplinaValue = $(this).val();
            if (!disciplinasPorSala[salaId]) {
                disciplinasPorSala[salaId] = [];
            }
            disciplinasPorSala[salaId].push(disciplinaValue);
        });
        salaIds.forEach(function(salaId) {
            if (!disciplinasPorSala[salaId]) {
                disciplinasPorSala[salaId] = [];
            }
        });

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
                grupos: grupos,
               
                salas: salas,
                sala_disciplinas: disciplinasPorSala,
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
                window.location.assign("/professor");
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

        var grupos = [];
        grupos.push($("#grupos").val());

        var salas = [];
        var sala = $("input[name='salas[]']");
        for (var i = 0; i < sala.length; i++) {
            if (sala[i].checked) {
                salas.push(sala[i].value);
            }
        }

        var disciplinasPorSala = {};
        var salaIds = [];
        $("input[name='disciplina[]']").each(function() {
            var salaId = $(this).attr('data-sala-id');
            if (salaIds.indexOf(salaId) === -1) {
                salaIds.push(salaId);
            }
        });
        $("input[name='disciplina[]']:checked").each(function() {
            var salaId = $(this).attr('data-sala-id');
            var disciplinaValue = $(this).val();
            if (!disciplinasPorSala[salaId]) {
                disciplinasPorSala[salaId] = [];
            }
            disciplinasPorSala[salaId].push(disciplinaValue);
        });
        salaIds.forEach(function(salaId) {
            if (!disciplinasPorSala[salaId]) {
                disciplinasPorSala[salaId] = [];
            }
        });

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

                salas: salas,
                disciplinas: disciplinasPorSala,
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
                window.location.assign("/professor");
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
                window.location.assign("/professor");
            }
        });
    });
});