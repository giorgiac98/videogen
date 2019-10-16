$(document).ready(function(){

  $("#paypalDetails").hide();
  $("#debit, #credit").each(function(){
    $(this).click(function(e){
        $("#cardDetails").show();
        $("#paypalDetails").hide();
    });
  });
  $("#paypal").click(function(e){
    $("#paypalDetails").show();
    $("#cardDetails").hide();
  });
});
