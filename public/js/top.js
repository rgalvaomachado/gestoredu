function slideMenu(){
    sliderMenu = $('#slideMenu').is(':checked');
    if (sliderMenu){
        $('.grid-item-menu').hide();
        $('.grid-content').removeClass('grid-container')
    }else{
        $('.grid-item-menu').show();
        $('.grid-content').addClass('grid-container')
    }
}

function slideMenuMobile(){
    sliderMenu = $('#slideMenuMobile').is(':checked');
    if (sliderMenu){
        $('.grid-item-menu-mobile').hide();
        $('.grid-content').removeClass('grid-container')
    }else{
        $('.grid-item-menu-mobile').show();
        $('.grid-content').addClass('grid-container')
    }
}

function logout(){
    $.ajax({
        method: "POST",
        url: "/src/controller/Controller.php",
        data: {
            metodo: "logout"
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                window.location.assign("login")
            }else{
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}