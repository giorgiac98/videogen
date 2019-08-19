$(document).ready(function(){
  $('#modifyProduct').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var game_id = button.data('id')     // Extract info from data-id attribute
    var row = button.parent().parent()
    let title = row.children()[1].textContent
    let producer = row.children()[2].textContent
    let price = Number(row.children()[4].textContent.substr(1))
    let qty = row.children()[5].textContent

    $("#modifyDataForm input[name=prodTitle]").val(title)
    $("#modifyDataForm input[name=producer]").val(producer)
    $("#modifyDataForm input[name=price]").val(price)
    $("#modifyDataForm input[name=qty]").val(qty)
  });

  $("#deleteToggle").click(function(e){
    $('#confirmDelete').prop('disabled', function(i, v) { return !v; });
  });
});
