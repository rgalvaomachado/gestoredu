$(document).ready(function() {
    $('#configurar').submit(function(e) {
        e.preventDefault();
        var formData = {};
        
        var checkboxes = document.querySelectorAll('#configurar input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            formData[checkbox.name] = checkbox.checked ? '1' : '0';       
        });

        var texts = document.querySelectorAll('#configurar input[type="text"]');
        texts.forEach(function(text) {
            formData[text.name] = text.value;      
        });

        var selects = document.querySelectorAll('#configurar select');
        selects.forEach(function(select) {
            formData[select.name] = select.value;      
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
            }
        });
    });
});