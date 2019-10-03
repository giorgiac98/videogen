$(document).ready(function() {
  var console;

  $('#selectConsole').click(function(e) {
    $("#addToCart").prop('disabled', false);
    // bisogna tradurre in jquery queste cose
    // non c'è più la select sono buttons
    id_console = document.getElementById("inputGroupConsole").value;
    document.getElementById("price-"+ id_console).style.display = "block";
    console()
  })

  $("#addToCart").click(function(e) {
      alert(console)
  });

  var previous;
  function display() {

    if(id_console != "Scegli..."){

      document.getElementById("order").disabled = false;
    }else{
      document.getElementById("order").disabled = true;
    }
    if(previous != "Scegli..."){
      document.getElementById("price-"+ previous).style.display = "none";
    }
    previous = id_console;
  }
  function prev() {
    previous = document.getElementById("inputGroupConsole").value;
  }
});
