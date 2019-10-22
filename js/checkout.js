$(document).ready(function(){

  $("#paypalDetails").hide();
  $("#debit, #credit").each(function(){
    $(this).click(function(e){
        $("#cardDetails").show();
        $("#paypalDetails").hide();
        $("#cc-name").prop('required', true);
        $("#cc-number").prop('required', true);
        $("#cc-expiration").prop('required', true);
        $("#cc-cvv").prop('required', true);
    });
  });
  $("#paypal").click(function(e){
    $("#paypalDetails").show();
    $("#cardDetails").hide();
    $("#cc-name").prop('required', false);
    $("#cc-number").prop('required', false);
    $("#cc-expiration").prop('required', false);
    $("#cc-cvv").prop('required', false);
  });
  $("#connectPaypal").click(function(e){
    $("#connectPaypal").text('Connessione in corso...')
    setTimeout(function(){
      $("#connectPaypal").text('Account Paypal collegato!')
    }, 2000)
  });
});
