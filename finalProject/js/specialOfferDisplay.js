/*globle $*/
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "api/getProduct.php",
        dataType: "json",
        success: function(data,status) {
            var randomProductId = Math.floor(Math.random() * data.length);
            $("#specialOffer").append("<h2> Special Offer: " + data[randomProductId].productName + "</h2> " +
                                        "<img src=" + data[randomProductId].productImage +" width='300' height='330'>" +
                                        "<h2> Price: $" + parseFloat(data[randomProductId].productPrice).toFixed(2) + "</h2>")
        },
        complete: function(data,status) { //optional, used for debugging purposes
        //alert(status);
        }
    });//end ranProduct
});//documentReady   