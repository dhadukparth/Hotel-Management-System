$(document).ready(function(){

    // Toggle Menu
    $('.togglebtn').click(function(){
        $('header').toggleClass('mobilemenu');
    });

    // Remove Toggle Menu
    $('li a').click(function(){
        $('header').removeClass('mobilemenu');
    });

});


// Scroll Top Effect
$(window).on('scroll',function () {
    if ($(window).scrollTop()) {
        $('body').addClass('scroll');
    }
    else{
        $('body').removeClass('scroll');  
    }
});


// Right Click Disable
$(document).bind("contextmenu",function(e){
    return false;
});