$(".nombre").keyup(function (e) { 
    $(".nombre").removeClass("is-invalid");
});


$(".oferta").css("display", "none");

$(".checkOferta").on("click",function(){
    if( $('#checkOferta').is(':checked') ) {
        $(".oferta").css("display", "block");
    }else {
        $(".oferta").css("display", "none");
    }
    $('.anterior').val(null);
});


$(".anterior").keyup(function () { 
    let anteror = $('.anterior').val();
    let precio = $(".precio").val()
    if (anteror >= precio && precio != null){
        $(".anterior").removeClass("is-invalid");
    }else{
        $(".anterior").addClass("is-invalid");
    }
});
$(".precio").keyup(function () { 
    let anteror = $('.anterior').val();
    let precio = $(".precio").val()
    if (anteror >= precio && anteror != null){
        $(".anterior").removeClass("is-invalid");
    }else{
        $(".anterior").addClass("is-invalid");
    }
});
