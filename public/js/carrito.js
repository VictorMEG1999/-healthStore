// $(".plus").click(function () {
//  let elemento = $(this)[0].parentElement.parentElement;
//  let cantidad =  $(".cantidad",elemento).val();
 
// });
// $(".minus").click(function () {
   
// });
$(".cantidad").keyup(function () { 
  
   //definicion de ruta de formulario
   let cantidad = $(this).val();
   let id =$(this).attr('id');
   // let ruta = $(this)[0].parentElement.parentElement;
   // ruta =$(".form",ruta).attr("action")+'&cantidad='+cantidad;
   // var ajax = new XMLHttpRequest();
   // ajax.open('POST',"controllers/accionesCarrito.php",true);
   // ajax.setRequestHeader("content-type","application/x-www-form-urlencoded");
   // ajax.onreadystatechange = function(){
   //    alert(ajax.responseText);
   // }
   // ajax.send("id=b","cantidad=a");
   $.ajax({
      type: "POST",
      url: "controllers/accionesCarrito.php",
      data: {id: id,cantidad: cantidad},
      success: function (response) {
         console.log(response);
         window.location.href = "?p=carrito";
      }
   });
});