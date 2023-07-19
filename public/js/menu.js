function menu(){
    checkMenu = $('#checkMenu').is(':checked');
    if (checkMenu){
        $('#menu').hide();
    }else{
        $('#menu').show();
    }
}