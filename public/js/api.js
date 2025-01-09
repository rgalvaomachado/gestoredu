function apiGet(url, data = null){
    $.ajax({
        method: "GET",
        url: '/api' + url,
        headers: {
            "Content-Type": "application/json",
        },
        data: data,
        async: false,
        complete: function(response) {
            responseData = JSON.parse(response.responseText);
        }
    });

    return responseData;
}

function apiPost(url, params = null, callback = null){
    $.ajax({
        method: "POST",
        url: "/api/usuario",
        headers: {
            "Content-Type": "application/json",
        },
        data: JSON.stringify(jsonData),
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
}

function apiPut(url, params = null, callback = null){
    $.ajax({
        method: "PUT",
        url: "/api/usuario",
        headers: {
            "Content-Type": "application/json",
        },
        data: JSON.stringify(jsonData),
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
}

function apiDelete(url, params = null, callback = null){
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
}