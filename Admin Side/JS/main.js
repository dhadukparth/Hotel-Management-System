$(document).ready(function(){

    // Navbar
    $('#btn').click(function(){
        $('.sidebar').toggleClass('active');
    });

    $('#btn').click(function(){
        $('main').toggleClass('active');
    });


    //  Edit Model Box
    $('.model-btn').click(function(){
        $('.modal-bg').addClass('model-active');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();


        $('#idno').val(data[0]);
        $('#name').val(data[1]);
        $('#roomno').val(data[2]);
        $('#mobile').val(data[4]);
        $('#status').val(data[9]);
        $('#address').val(data[10]);
        $('#roomtype').val(data[11]);
        $('#email').val(data[12]);
    });

    
    // Checkout Model
    $('.checkout-btn').click(function(){
        $('.checkout-model-bg').addClass('checkout-model-open');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();


        $('#idno').val(data[0]);
        $('#name').val(data[1]);
        $('#room_no').val(data[2]);
        $('#check_in').val(data[6]);
        $('#check_out').val(data[7]);
        $('#email').val(data[9]);
        $('#room_type').val(data[10]);
        
        $('#price').val(data[8] - 2000);

    });

    // Car Model
    $('.cars-btn').click(function(){
        $('.car-model-bg').addClass('car-model-open');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        $('#cidno').val(data[0]);
        $('#cname').val(data[1]);
        $('#cmobile').val(data[3]);
        $('#cemail').val(data[9]);
        
    });

});

$(document).bind("contextmenu",function(e){
    return false;
});