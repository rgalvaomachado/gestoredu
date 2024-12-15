$(document).ready(function() {
    $('#criar').submit(function(e) {
        e.preventDefault();
        var fileInput = document.getElementById("imagem"); // Substitua pelo ID do seu input de arquivo
        var file = fileInput.files[0];
        var nome = $("#nome").val();
        var conteudo = $("#conteudo").val();
        var tamanho_letra = $("#tamanho_letra").val();
        
        var reader = new FileReader();
        reader.onloadend = function() {
            var base64data = reader.result;
        
            var formData = {
                file: base64data,
                nome: nome,
                conteudo: conteudo,
                tamanho_letra: tamanho_letra,
            };
        
            $.ajax({
                method: "POST",
                url: "/api/certificado",
                headers: {
                    "Content-Type": "application/json",
                },
                data: JSON.stringify(formData),
                complete: function(response) {
                    var response = JSON.parse(response.responseText);
                    const alert = document.getElementById("messageAlert");
                    alert.innerHTML = response.message;
                    if (response.access) {
                        alert.style.color = "green";
                    } else {
                        alert.style.color = "red";
                    }
                    setTimeout(function() {
                        alert.innerHTML = "";
                    }, 3000);
                    window.location.assign("/certificado");
                }
            });
        };
        
        // Lê o arquivo como uma URL de dados (base64)
        reader.readAsDataURL(file);
    });

    $('#editar').submit(function(e) {
        e.preventDefault();
        var fileInput = document.getElementById("imagem"); // Substitua pelo ID do seu input de arquivo
        var file = fileInput.files[0];
        var nome = $("#nome").val();
        var conteudo = $("#conteudo").val();
        var tamanho_letra = $("#tamanho_letra").val();
        var id = $("#id").val();
        var formData = {
            nome: nome,
            conteudo: conteudo,
            tamanho_letra: tamanho_letra,
            id: id
        };
        
        if (file) {
            var reader = new FileReader();
            reader.onloadend = function() {
                var base64data = reader.result;
                formData.file = base64data; // Adiciona o arquivo ao formData
                sendData(formData);
            };
            reader.readAsDataURL(file);
        } else {
            sendData(formData); // Envia os dados mesmo sem arquivo
        }
    });

    $('#deletar').submit(function(e) {
        e.preventDefault();
        var id = $("#id").val();
        $.ajax({
            method: "DELETE",
            url: "/api/certificado",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                id: id,
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
                window.location.assign("/certificado");
            }
        });
    });

    $('#gerarCertificado').submit(function(e) {
        e.preventDefault();
        var id = $("#usuario").val();
        var nome = $('#usuario :selected').data('nome');
        var frequencia = $('#usuario :selected').data('frequencia');
        var aprovado = $('#usuario :selected').data('aprovado');
        const alert = document.getElementById("messageAlert");
        alert.style.color = "gray";
        alert.innerHTML = "Gerando Certificado...";
        $('#detalhes').hide();
        $.ajax({
            method: "POST",
            url: "/src/controller/Controller.php",
            data: {
                metodo: "gerarCertificado",
                id: id,
                nome: nome,
                frequencia: frequencia,
                aprovado: aprovado,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText)
                if (response.access) {    
                    alert.innerHTML = "";
                    $('#certificado').attr('src',response.path);
                    $('#baixarCertificado').show();
                } else {
                    const alert = document.getElementById("messageAlert");
                    alert.style.color = "red";
                    alert.innerHTML = response.message;
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                }
            }
        });
    })
});

function sendData(formData) {
    $.ajax({
        method: "PUT",
        url: "/api/certificado",
        headers: {
            "Content-Type": "application/json",
        },
        data: JSON.stringify(formData),
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            alert.style.color = response.access ? "green" : "red";
            setTimeout(function() {
                alert.innerHTML = "";
            }, 3000);
            window.location.assign("/certificado");
        }
    });
}