$(document).ready(function(){
  $("#checkoutButton").click(function(e){

  });

  $("#qta").on("input", () => void $("#prezzo").text("€ " +
    parseFloat($("#prezzo").attr("value"))*$("#qta").val()
  ));
});
