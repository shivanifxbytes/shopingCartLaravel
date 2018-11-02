$(document).on("change keyup blur", "#product_discount", function() {
  var amd = $('#product_price').val();
  var disc = $('#product_discount').val();
  if ( $.isNumeric(disc) && disc != '' && $.isNumeric(amd) && amd != '') {
  	var discount =(amd*disc)/100;

    $('#product_selling_price').val((parseFloat(amd)) - (parseFloat(discount)));
  }else{
    $('#product_selling_price').val('Please Enter Price And Discount Value In Numeric Form');
  }
});
$(document).on("change keyup blur", "#product_price", function() {
  var amd = $('#product_price').val();
  var disc = $('#product_discount').val();
  if ( $.isNumeric(disc) && disc != '' && $.isNumeric(amd) && amd != '') {
  	var discount =(amd*disc)/100;

    $('#product_selling_price').val((parseFloat(amd)) - (parseFloat(discount)));
  }else{
    $('#product_selling_price').val('Please Enter Price And Discount Value In Numeric Form');
  }
});