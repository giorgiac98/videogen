$(document).ready(function(){
    //initEvents();
});

function initEvents(){
    $("#confirmAddProduct").click( function(e){
        let name = $(this).closest('.modal-dialog').find('input[name="productName"]');
        let producer = $(this).closest('.modal-dialog').find('input[name="producer"]');
        let price = $(this).closest('.modal-dialog').find('input[name="price"]');
        alert('doing');
        $.ajax({
          method: 'POST',
          url: 'db/addProduct.php',
          data: {name : name, producer : producer, price : price},
          success: function(data){
            console.log(data);
            alert('aggiunto');
          }
        });
        $("#addProduct").modal('hide');
    });
}
