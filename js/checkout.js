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
  $("#connectPaypal").click(function(e){
    $("#connectPaypal").text('Connessione in corso...')
    setTimeout(function(){
      $("#connectPaypal").text('Account Paypal collegato!')
    }, 2000)
  });
});
