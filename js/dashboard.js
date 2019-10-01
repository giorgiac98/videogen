$(document).ready(function(){
  var game_id;

  var url = 0;
  var where = new URL(window.location.href).searchParams.get("where");
  if (where == "products"){
    console.log($('#myTab li:first-child a'))
    $('#myTab li:first-child a').tab('show')
  }
  else if (where == "orders")
    $('#myTab a[href="#orders"]').tab('show')
  else if (where == "users")
    $('#myTab a[href="#users"]').tab('show')

  // aprendo il modal di modifica, mostra le info di quel determinato prodotto
  $('#modifyProduct').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    game_id = button.data('id')     // Extract info from data-id attribute
    var row = button.parent().parent()
    let title = row.children()[1].textContent
    let producer = row.children()[2].textContent
    let price = Number(row.children()[4].textContent.substr(1))
    let qty = row.children()[5].textContent

    $("#modifyDataForm input[name=prodTitle]").val(title)
    $("#modifyDataForm input[name=producer]").val(producer)
    $("#modifyDataForm input[name=price]").val(price)
    $("#modifyDataForm input[name=qty]").val(qty)
    $("#deleteToggle").prop("checked", false);
  });

  // il toggle per eliminare prodotto
  $("#deleteToggle").click(function(e){
    $('#confirmDelete').prop('disabled', function(i, v) { return !v; });
  });

  // il pulsante che effettua la chiamata e elimina prodotto
  $("#confirmDelete").click(function(e){
    request = $.ajax({
        url: "db/removeProduct.php",
        type: "post",
        data: {'id': game_id}
    });
    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        $('#modifyProduct').modal('hide');
        window.location = 'http://localhost/videogen/admin.php?where=products'
    });
  });

  // il pulsante per confermare modifica prodotto
  $("#confirmModifyProduct").click(function(e){
    request = $.ajax({
        url: "db/modifyProduct.php",
        type: "post",
        data: {'id': game_id}
    });
    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        $('#modifyProduct').modal('hide');
        // ho provato a refreshare e andare nella pagina giusta ma diocan non va un cazzo
        window.location = 'http://localhost/videogen/admin.php?where=products'
        //window.location.reload();
    });
  });
});
