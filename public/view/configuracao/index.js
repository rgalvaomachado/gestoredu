$(document).ready(function() {
    $('#configurar').submit(function(e) {
        e.preventDefault();
        var formData = $('#configurar').serializeArray();
        formData.push({ name: 'metodo', value: 'configuracao' });
        $('#configurar input[type="checkbox"]').each(function() {
            var name = $(this).attr('name');
            var value = $(this).is(':checked') ? '1' : '0';
            formData.push({ name: name, value: value });
        });

        $.ajax({
            method: "POST",
            url: "/src/controller/Controller.php",
            data: formData,
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