function round(value) {
    return(Math.round(value * 100) / 100);
}

$(document).ready(function(){
  $("#checkoutButton").click(function(e){

  });

  $("#qta").on("input", () => void $("#prezzo").text("€ " +
    round(parseFloat($("#prezzo").attr("value"))*$("#qta").val())
  ));

});
