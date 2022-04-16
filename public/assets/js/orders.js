$(document).ready(function() {
    $("#submitOrder").click(Order);
});


var order = {};

function Order(e){
    e.preventDefault();
    order.name = $("#name").val();
    order.user_id = parseInt($("#user-id").val());
    order.phone = parseInt($("#phone").val());
    order.address = $("#address").val();
    order.city = $("#city").val();
    order.total_price = $("#totalPrice").html();

    ajax(
        "/order",
        "POST",
        "json",
        order,
        function(data){
            $("#order").fadeOut();
            alert(data.msg);
            document.location.reload();
        },
        function(xhr){
            var errs = xhr.responseJSON.errors;

            for (const [key, value] of Object.entries(errs)) {
                $("#" + key + 'Error').html(value);
                $("#" + key + 'Error').fadeIn();
            }

        }
    );
}

