/* global $ */
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "api/getProduct.php",
        dataType: "json",
        success: function(data,status) {
            //alert(data[0].productName);
            for (let i = 0; i < data.length; i++){
                $("#products").append(data[i].productName + " " + data[i].price + "<br>");
            }
        },
        complete: function(data,status) { //optional, used for debugging purposes
        //alert(status);
        }
    
    });// get products
    
    $.ajax({
        type: "GET",
        url: "api/getCategories.php",
        dataType: "json",
        success: function(data, status){
            data.forEach(function(key) {
                $("[name=type_list]").append("<option value=" + key["catId"] + ">"
                                                    + key["catName"] + "</option>");
            });
        }
    }); // get categories
    
    $("#searchForm").on("click", function(){
        $.ajax({
        type: "GET",
        url: "api/getSearchResults.php",
        dataType: "json",
        data: {
            "product" : $("[name=product]").val(),
            "type" : $("[name=type_list]").val(),
            "priceFrom" : $("[name=priceFrom]").val(),
            "priceTo" : $("[name=priceTo]").val(),
            "orderBy" : $("[name=orderBy]:checked").val(),
        },
            success: function(data, status){
                $("#results").html("");
                $("#results").append("<tr> " + 
                    "<th> Name </th> " +
                    "<th> Appearance </th> " +
                    "<th> Description </th> " +
                    "<th> Price </th> ");
                
                data.forEach(function(key){
                    $("#results").append("<tr class='itemWrapper' id='product" + key['productId']+"'></tr>");
                    $("#product" + key['productId']).append("<td>" + key['productName'] + "</td>"); 
                    $("#product" + key['productId']).append("<td>" + "<img src='" + key['productImage'] + 
                        "' class='productImg' alt='Image of Product' width ='200' height='200'/>" + " </td>");
                    $("#product" + key['productId']).append("<td>" + key['productDescription'] + "</td>");
                    $("#product" + key['productId']).append("<td>" + "$" + key['productPrice'] + "</td>");
                    $("#product" + key['productId']).append("<td class='add' >" + "<a href='#' class='purchaseLink' id='" + 
                        key['productId'] + "' >Add to Cart</a> " + "</td>");
                });
                $('head').append('<link rel="stylesheet" type="text/css" href="css/products.css">');
            }
        });
    }); // searchForm
    
    $(document).on('click', '.purchaseLink', function(){
        if (localStorage.getItem("cart") === null) {
            var cart = {}
            var key = $(this).attr('id').toString();
            
            cart[key] = '1';
            localStorage.setItem("cart", JSON.stringify(cart));
        } else {
            var cart = JSON.parse(localStorage.getItem("cart"));
            var key = $(this).attr('id').toString();
            if (!(key in cart)) {
                cart[key] = '1';
                localStorage.setItem("cart", JSON.stringify(cart));
            } else {
                cart[key] = parseInt(cart[key], 10) + 1;
                localStorage.setItem("cart", JSON.stringify(cart));
            }
        }
    })// purchase Link
}); // documentReady