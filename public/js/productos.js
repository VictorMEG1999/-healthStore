$('.Descartar').click(function () { 
    $('#Descartar').attr('value',$(this).val());
});
$(".categarias").click( function () {
    if ($(".categariasmenu").hasClass("show")){
        $(".categariasmenu").removeClass("show");
    }else{
        $(".categariasmenu").addClass("show");
    }
});
let Precio="";
$('.agregar').click(function () { 
    let id =$(this).val();
    let img =  $(".img"+id).attr("src");
    let nombre =  $(".nombre"+id).html();
    let descripcion =  $(".descripcion"+id).html();
    

    $(".muestraImg").attr("src",img);
    $(".muestraNombre").html(nombre);
    $(".muestraInfo").html(descripcion);
    $('.Agregar').val(id);

});
