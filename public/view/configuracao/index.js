$(document).ready(function() {
    $('#configurar').submit(function(e) {
        e.preventDefault();
        var formData = {};
        var checkboxes = document.querySelectorAll('#configurar input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            var name = checkbox.name;
            var value = checkbox.checked ? '1' : '0';
            formData[name] = value;
        });

        $.ajax({
            method: "POST",
            url: "/api/configurar",
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify(formData),
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
                window.location.assign("../configuracao");
            }
        });
    });
});