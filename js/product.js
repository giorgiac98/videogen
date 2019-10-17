$(document).ready(function() {
  var prev = '';

  $('#selectConsole').on("click", function(){
    setTimeout(function() {
      id_gioco = $("#selectConsole").children(".active").children().prop('id');
      if(prev != ''){
        $("#price-" + prev).hide();
      }
      prev = id_gioco;
      $("#price-" + id_gioco).show();
    }, 50);
  })

  $('#selectConsole').click(function(e) {
    $("#addToCart").prop('disabled', false);
  })

  $("#addToCart").click(function(e) {
    id_gioco = $("#selectConsole").children(".active").children().prop('id')
    var url = './cart.php';
    var form = $('<form action="' + url + '" method="post">' +
      '<input type="text" name="id_gioco" value="' + id_gioco + '" />' +
      '</form>');
    $('body').append(form);
    form.submit();
  });
});
