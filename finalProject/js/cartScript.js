/*global $*/
var i = 0;
var name = "";
var price = 0;
var qty = 0;
var total = 0;
var subtotal = 0;
var subtotal2 = 0;
var tax = 0;
var tax2 = 0;
var completeTotal = 0;
var completeTotal2 = 0;

$(document).ready(function(){
    if (localStorage.getItem("cart") === null) {
        $("#cartEmpty").html("Your shopping cart is currently empty!");
    } else {
        var cart = JSON.parse(localStorage.getItem("cart"));
        
        $("#productsPurchased").css("display", "none");

        $("#productsPurchased").append("<tr>" +
            "<th>Product</th>" +
            "<th>Unit Price</th>" +
            "<th>Quantity</th>" +
            "<th>Total</th>" +
            "</tr>"
        );
        
        for (var id in cart){
            $.ajax({
                type: "GET",
                url: "api/getProductInfo.php",
                dataType: "json",
                data:{"productId": id},
                async: false,
                success: function(data, status) {
                     name = data["productName"];
                     price = parseFloat(data["productPrice"]);
                }
            });
            //alert(id + " " + cart[id]); // 1st id is the product, 2nd is the quantity
            $("#productsPurchased").append("<tr>");
            $("#productsPurchased").append("<td class='row' id='product'>" + name + "</td>");
            $("#productsPurchased").append("<td class='row' id='productPrice" + i + "'>" + "$" + price + "</td>");
            $("#productsPurchased").append("<td class='row'><input type='text' class='quantityChange' id='qty" + i +  "'></td>");
            $("#productsPurchased").append("<td class='row'><span id='productTotal" + i + "'></span></td>");
            $("#productsPurchased").append("</tr>");
            $("#productPrice" + i).val(price);
            qty = $("#qty" + i).val(cart[id]);
            total = (price * parseInt(cart[id])).toFixed(2);
            $("#productTotal" + i).html("$" + total);
            $("#productTotal" + i).val(total);
            i++;
        }
        $("#productsPurchased").append("<tr>" +
            "<td class='row'>Subtotal</td>" +
            "<td class='row'></td>" +
            "<td class='row'></td>" +
            "<td id='subtotal' class='row'></td>" +
            "</tr>"
        );
        $("#productsPurchased").append("<tr>" +
            "<td class='row'>Tax (10%)</td>" +
            "<td class='row'></td>" +
            "<td class='row'></td>" +
            "<td id='tax' class='row'></td>" +
            "</tr>"
        );
        $("#productsPurchased").append("<tr>" +
            "<td class='row'>Total</td>" +
            "<td class='row'></td>" +
            "<td class='row'></td>" +
            "<td id='total' class='row'></td>" +
            "</tr>"
        );
        
        for (let j = 0; j < i; j++){
            subtotal += parseFloat($("#productTotal" + j).val());
        }
        subtotal2 = subtotal.toFixed(2);
        $("#subtotal").val(subtotal2);
        $("#subtotal").html("$" + subtotal2);
        
        tax = (subtotal * 0.10);
        tax2 = tax.toFixed(2);
        
        $("#tax").val(tax2);
        $("#tax").html("$" + tax2);
        
        
        completeTotal = (tax + subtotal);
        completeTotal2 = completeTotal.toFixed(2);
        
        $("#total").val(completeTotal2);
        $("#total").html("$" + completeTotal2);
        $('head').append('<link rel="stylesheet" type="text/css" href="css/cart.css">');
        $("#productsPurchased").css("display", "inline");
    }
});
$(document).on("change", ".quantityChange", function() {
    //alert('hello');
    for (let m = 0; m < i; m++){
        qty = $("#qty" + m).val();
        total = ($("#productPrice" + m).val() * parseInt(qty)).toFixed(2);
        $("#productTotal" + m).val(total);
        $("#productTotal" + m).html("$" + total);
    }
    subtotal = 0;
    for (let j = 0; j < i; j++){
            subtotal += parseFloat($("#productTotal" + j).val());
        }
        subtotal2 = subtotal.toFixed(2);
        $("#subtotal").val(subtotal2);
        $("#subtotal").html("$" + subtotal2);
        
        tax = (subtotal * 0.10);
        tax2 = tax.toFixed(2);
        
        $("#tax").val(tax2);
        $("#tax").html("$" + tax2);
        
        
        completeTotal = (tax + subtotal);
        completeTotal2 = completeTotal.toFixed(2);
        
        $("#total").val(completeTotal2);
        $("#total").html("$" + completeTotal2);
})