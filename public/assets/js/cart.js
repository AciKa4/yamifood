const token = $('meta[name="csrf-token"]').attr('content');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': token
    }
});

$(document).ready(function(){

    $("#msg").css('display', 'none');
    $("#addedToCartSuccess").hide();

    $(".addToOrder").click(function(){

        let productId = parseInt($(this).data("productid"));
        addToCart(productId);
    });

    $(".removeProductFromCart").click(function(){
        let productId = parseInt($(this).data("productid"));
        deleteFromCart(productId);
    })

    $(".quantity").blur(changeQuantity);

});

    function addToCart(productId){

        ajax(
            "/cart",
            "POST",
            "json",
            {
                productId,
                '_token': $('input[name="_token"]').val()
            },
            function(data){
                $("#addedToCartSuccess").fadeIn();
                $("#addedToCartSuccess").html(data.msg);
            },
            function(jqXHR){
            console.log(jqXHR.statusText);
            }
            );
    }


    function deleteFromCart(productId){

        ajax(
            "/cart",
            "DELETE",
            "json",
            {
                productId,
                '_token': $('input[name="_token"]').val()
            },
            function(data){

                console.log(data);
                $("#row" + productId).remove();
                let totalPrice = 0;

                for (let el of data.itemsinCart) {
                    totalPrice += el.quantity * parseFloat($("#priceProduct" +el.product_id).html());
                }

                $("#totalPrice").html(totalPrice);
                $("#msg").fadeIn();
                $("#msg").html(data.msg);
                $("#prodNumber").html(data.itemsinCart.length);

            },
            function(jqXHR){

                let status = jqXHR.status;

                if(status == 400){
                    $("#order_form").hide();
                    $("#cartDiv").html(`
                 <div class='mx-auto d-flex w-75'><img class=' w-50 mx-auto' src="assets/img/emptycart.png" alt='Your order is empty'></div><h1 class='py-3 text-center'>Your order is empty</h1>
                `)
                }

            }
        );
    }

    function changeQuantity(){

        var quantityVal = parseInt($(this).val());
        var productId = $(this).data("productid");

    if(quantityVal <= 0)
        $(this).val(1);

        ajax(
            "/cart",
            "PUT",
            "json",
            {
                productId,
                quantityVal,
                '_token': $('input[name="_token"]').val()
            },
            function(data){

                let totalPrice = 0;

                for (let el of data.itemsinCart) {
                    totalPrice += el.quantity * parseInt($("#priceProduct" +el.product_id).html());
                }

                $("#totalPrice").html(totalPrice);
            },
            function(jqXHR){

               console.log(jqXHR.responseText);

            }
        );

    }



