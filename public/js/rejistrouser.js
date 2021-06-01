
$(".email").keyup(function (e) { 
    $(".email").removeClass("is-invalid");
});

$(".passv").keyup(function (e) { 
    if($(this).val()==$(".pass").val()){
        disabledtrue();
    }else {
        disabledfalse ();
    }
});

$(".pass").keyup (function (e) { 
    if($(this).val()==$(".passv").val()){
        disabledtrue();
    }else {
        disabledfalse ();
    }
});
function disabledtrue(){
    $(".Acceder").attr("disabled",false);
    $(".pass").addClass("is-valid");
    $(".pass").removeClass("is-invalid");
    $(".passv").addClass("is-valid");
    $(".passv").removeClass("is-invalid");
}
function disabledfalse (){
    $(".Acceder").attr("disabled",true);
    $(".pass").removeClass("is-valid");
    $(".pass").addClass("is-invalid");
    $(".passv").removeClass("is-valid");
    $(".passv").addClass("is-invalid");
}