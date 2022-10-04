$(function () { 
  var i = 1;
  $('.boton').click(function (e) {
    e.preventDefault();
      i++;
    $('.guardar').append('<div id="producto'+i+'" class="form-row">'
      +'<h1>registro producto</h1>'
          +'<div class="row">'
    +'<div class="col-25">'
      +'<label for="fname">Digite el nombre del producto:</label>'
    +'</div>'
    +'<div class="col-75">'
    +'<select class="input">'
        +'<option value="">Seleccione producto</option>'
      +'</select>'
    +'</div>'
  +'</div>'

  +'<div class="row">'
    +'<div class="col-25">'
      +'<label for="lname">Digite la cantidad del producto: </label>'
    +'</div>'
    +'<div class="col-75">'
      +'<input type="text" class="input quantity" placeholder="3..." id="quantity_'+i+'">'
    +'</div>'
  +'</div>'
  +'<div class="row">'
    +'<div class="col-25">'
      +'<label for="lname">Digite el precio por unidad: </label>'
   +' </div>'
    +'<div class="col-75">'
      +'<input type="text" class="input  price"  placeholder="200..." id="price_'+i+'">'
    +'</div>'
  +'</div>'

  +'<div class="row">'
    +'<div class="col-25">'
      +'<label for="lname"> precio total: </label>'
    +'</div>'
    +'<div class="col-75">'
      +'<input type="text" class="input total"  placeholder="3.000..." id="total_'+i+'"><br><br>'
    +'</div>'
    +'</div class="row">'
        +'<button class="eliminar" id="'+i+'"> <span>Eliminar venta </span></button>'
        +'<hr>'
      +'</div>'
      );  
  });


   $(document).on('click', '.eliminar', function(e) {
     e.preventDefault();

      var id = $(this).attr("id");
       $('#producto'+id+'').remove();
       $('#total_'+id).val(parseFloat(total))-parseFloat(subTotal);
    });
});


$(document).on('blur', "[id^=quantity_]", function(){
calculateTotal();
}); 
$(document).on('blur', "[id^=price_]", function(){
calculateTotal();
}); 
function calculateTotal(){
var totalAmount = 0; 
$("[id^='price_']").each(function() {
var id = $(this).attr('id');
id = id.replace("price_",'');
var price = $('#price_'+id).val();
var quantity  = $('#quantity_'+id).val();
if(!quantity) {
  quantity = 1;
}
var total = price*quantity;
$('#total_'+id).val(parseFloat(total));  
totalAmount += total;  
});
$('#Totalsub').val(parseFloat(totalAmount));  
var taxRate = $("#descuento").val();
var subTotal = $('#Totalsub').val();  
if(subTotal) {
var taxAmount = subTotal*taxRate/100;
subTotal = parseFloat(subTotal)-parseFloat(taxAmount);
$('#Totalpago').val(subTotal); 
$('#totaldescuento').val(taxAmount);    
}
}

