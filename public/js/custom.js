// $(document).ready(function () {
//   $(document).on("click", ".increment-btn", function (e) {
//     e.preventDefault();

//     var qty = $(this).closest(".product_data").find(".input-qty").val();

//     var value = parseInt(qty, 10);
//     value = isNaN(value) ? 0 : value;
//     if (value < 10) {
//       value++;

//       $(this).closest(".product_data").find(".input-qty").val(value);
//     }
//   });

//   $(document).on("click", ".decrement-btn", function (e) {
//     e.preventDefault();

//     var qty = $(this).closest(".product_data").find(".input-qty").val();

//     var value = parseInt(qty, 10);
//     value = isNaN(value) ? 0 : value;
//     if (value > 1) {
//       value--;

//       $(this).closest(".product_data").find(".input-qty").val(value);
//     }
//   });

//   $(document).on("click", ".addToCartBtn", function (e) {
//     e.preventDefault();
//     var qty = $(this).closest(".product_data").find(".input-qty").val();
//     var prod_id = $(this).val();

//     $.ajax({
//       method: "POST",
//       url: "functions/handlecart.php",
//       data: {
//         prod_id: prod_id,
//         prod_qty: qty,
//         scope: "add",
//       },
//       success: function (response) {
//         if (response == 201) {
//           alertify.success("Product added to cart");
//           $( "#mycart" ). load(window. location. href + " #mycart" );
//           load_cart_item_number();

//         } else if (response == "existing") {
//           alertify.success("Product already in cart");
//         } else if (response == 401) {
//           alertify.success("Login to continue");
//         } else if (response == 500) {
//           alertify.success("Something went wrong");
//         }
//       },
//     });
//   });

//   $(document).on("click", ".updateQty", function () {
//     var qty = $(this).closest(".product_data").find(".input-qty").val();
//     var prod_id = $(this).closest(".product_data").find(".prodId").val();

//     $.ajax({
//       method: "POST",
//       url: "functions/handlecart.php",
//       data: {
//         prod_id: prod_id,
//         prod_qty: qty,
//         scope: "update",
//       },
//       success: function (response) {
//         $( "#mycart" ). load(window. location. href + " #mycart" );

//       },
//     });
//   });

//   $(document).on("click", ".deleteItem", function () {
//     var cart_id = $(this).val();
//     $.ajax({
//       method: "POST",
//       url: "functions/handlecart.php",
//       data: {
//         cart_id: cart_id,

//         scope: "delete",
//       },
//       success: function (response) {
//         if (response == 200) {
//           alertify.success("Item removed successfully");
        
//           $( "#mycart" ). load(window. location. href + " #mycart" );
//           load_cart_item_number();

//         } else {
//           alertify.success(response);
//         }
//       },
//     });
//   });

 
//     $(document).on("click",".addCart", function (e) {
//         e.preventDefault();
//         var $form = $(this).closest(".form-submit")
//         var pid = $form.find(".pid").val();
//         var qty = 1;
//         $.ajax({
//           method: "POST",
//           url: "functions/handlecart.php",
//           data: {
//             pid:pid,
//             qty:qty,
//           },
         
//           success: function (response) {
//             if(response == 201)
//               {
//                  alertify.success("Product added to cart");
//                  $( "#mycart" ). load(window. location. href + " #mycart" ); 
//                  load_cart_item_number();
                 
//               }
//               else if(response == "existing")
//               {
//                  alertify.success("Product already in cart");
//               }
//               else if(response == 401)
//               {
//                   alertify.success("Login to continue");
//               }
//               else if(response == 500)
//               {
//                   alertify.success("Something went wrong");

//               }
//           }
//         });
        
//     });

// load_cart_item_number();
//     function load_cart_item_number(){
//       $.ajax({
//         method: "GET",
//         url: "functions/handlecart.php",
//         data: {
//           cartItem: "cart_item"
//         },
        
//         success: function (response) {
//           $("#cart-item").html(response);
//         }
//       });
//     }
 
// });
