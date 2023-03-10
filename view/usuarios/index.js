function buscarRepresentante(){
    var id = $("#representante").val();
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "getRepresentante",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.representante.assinatura){
                var srcData = response.representante.assinatura;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                newImage.id = "imgAssinaturaRepresentante";
                newImage.style.maxWidth = "100%";
                newImage.style.maxHeight = "100%";
                document.getElementById("assinaturaRepresentante").innerHTML = newImage.outerHTML;
            }else{
                $('#assinaturaRepresentante').height(0);
                document.getElementById("assinaturaRepresentante").innerHTML = 'Não há assinatura';
            }
            if(response.access){
                $('#detalhes').show();
                $('#nome').val(response.representante.nome);
                $('#usuario').val(response.representante.usuario);
            }
        }
    });
}

function criarRepresentante(){
    var nome = $("#nome").val();
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();
    var filesSelected = document.getElementById("assinatura").files;
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "criarRepresentante",
            nome: nome,
            usuario: usuario,
            senha: senha,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if(response.access){
                if (filesSelected.length > 0) {
                    var fileToLoad = filesSelected[0];
                    var fileReader = new FileReader();
                    fileReader.onload = function(fileLoadedEvent) {
                        var assinatura = fileLoadedEvent.target.result
                        $.ajax({
                            method: "POST",
                            url: "../controller/Controller.php",
                            data: {
                                metodo: "salvaAssinaturaRepresentante",
                                assinatura: assinatura,
                                id: response.id,
                            }
                        });
                    }
                    fileReader.readAsDataURL(fileToLoad);
                }
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("view/representante/criar.html");
                    });
                }, 1000);
            }else{
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
            verificaSessão();
        }
    });
}

function editarRepresentante(){
    var id = $("#representante").val();
    var nome = $("#nome").val();
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();
    var filesSelected = document.getElementById("assinatura").files;
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "salvarRepresentante",
            id: id,
            nome: nome,
            usuario: usuario,
            senha: senha,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if(response.access){
                if (filesSelected.length > 0) {
                    var fileToLoad = filesSelected[0];
                    var fileReader = new FileReader();
                    fileReader.onload = function(fileLoadedEvent) {
                        var assinatura = fileLoadedEvent.target.result
                        $.ajax({
                            method: "POST",
                            url: "../controller/Controller.php",
                            data: {
                                metodo: "salvaAssinaturaRepresentante",
                                assinatura: assinatura,
                                id: id,
                            }
                        });
                    }
                    fileReader.readAsDataURL(fileToLoad);
                }
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("view/representante/editar.html");
                    });
                }, 1000);
            }else{
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
            verificaSessão();
        }
    });
}

function excluirRepresentante(){
    if (confirm("Voce realmente deseja excluir?")){
        var id = $("#representante").val();
        $.ajax({
            method: "POST",
            url: "../controller/Controller.php",
            data: {
                metodo: "excluirRepresentante",
                id: id,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 3000);
                if(response.access){
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                        $(function(){
                            $("#content").load("view/representante/editar.html");
                        });
                    }, 1000);
                }else{
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                }
                verificaSessão();
            }
        });
    }
}

function buscarRepresentantes(){
    $.ajax({
        method: "POST",
        url: "../controller/Controller.php",
        data: {
            metodo: "getRepresentantes",
        },
        complete: function(response) {
            var representantes = JSON.parse(response.responseText);
            representantes.map(({id,nome}) => {
                $('#representante').append(`<option value='${id}'>${nome}</option>`);
            });
        
        }
    });
}