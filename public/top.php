<div id="topMenu">
    <input type="checkbox" id="slideMenu" checked style="display: none;">
    <label class="slideMenu" for="slideMenu">
        <i class="fa fa-bars" aria-hidden="true" onclick="slideMenu()"></i>
    </label>
    <!-- <img src="../public/img/hubis.png" id="logo-hubis"> -->
    <div class="logoutMenu" id="usuarioLogado">
        <label>
            <?php
                echo $_SESSION['usuario'];
            ?>
        </label>
        <a class="logoutMenu"><i class="fa fa-sign-out" aria-hidden="true" onclick="logout()"></i></a>
    </div>
</div>

<script>
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

    function logout(){
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
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
</script>