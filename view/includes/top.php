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
        <a class="logoutMenu" href="../logon/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
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
</script>