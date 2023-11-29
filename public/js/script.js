
   $(document).ready(function () { 
    $(document).on("click", ".increment-btn", function (e) {  
        e.preventDefault();
        
        var qty = $(this).closest(".cart-data").find(".input-qty").val();
    
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
          value++;
    
          $(this).closest(".cart-data").find(".input-qty").val(value); 
        }
      });
    

     $(document).on("click", ".decrement-btn", function (e) {
        e.preventDefault();
    
        var qty = $(this).closest(".cart-data").find(".input-qty").val();
    
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
          value--;
    
          $(this).closest(".cart-data").find(".input-qty").val(value);
        }
      });
       

      $(document).on("click", ".updateQty", function () {
        var quantity = $(this).closest(".cart-data").find(".input-qty").val();
        var cart_id = $(this).closest(".cart-data").find(".card-id").val();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
          }
      });
        $.ajax({
            method: 'POST',
            url: '/update-cart/' + cart_id,
            data: {
                cart_id: cart_id,
                quantity: quantity, 
                _token: $('meta[name="csrf-token"]').attr('content'),
      
        },
        success: function (response) {
            // alert("Quantity updated successfully");
            $("#cart").load(window.location.href + " #cart");
           

        },
        error: function (xhr, status, error) {
            console.error("Error updating quantity:", error);
        }
    });
});


      $(document).on("click",".delete-btn", function() {
       
        var cart_id = $(this).closest(".cart-data").find(".card-id").val();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
          }
      });
        $.ajax({
            method: 'GET',
            url: '/delete-cart/' + cart_id,
            data: {
                cart_id: cart_id, 
                _token: $('meta[name="csrf-token"]').attr('content'),
      
        },
        success: function (response) {
            
            $("#cart").load(window.location.href + " #cart");
           

        },
        error: function (xhr, status, error) {
            console.error("Error deleting item:", error);
        }
      }); 
    
    });

});