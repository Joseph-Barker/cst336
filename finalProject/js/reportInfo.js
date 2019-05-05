/*global $*/
let totalRev = 0;
let avgProduct = 0;
let totalProducts =0;
$(document).ready(function(){
    $.ajax({
        method: "GET",
        url: "api/getReportInfo.php",
        dataType: "json",
        data: { "action": "history" },
        success: function(data,status) {
            data.forEach(function(history){
                $("#repTable").append("<tr> " +
                "<td class=\"row\">" + history.userId + "</td>" +
                "<td class=\"row\">" + history.firstName + "</td>" +
                "<td class=\"row\">" + history.lastName + "</td>" +
                "<td class=\"row\">" + history.purchaseId + "</td>" +
                "<td class=\"row\">" + history.productId + "</td>" + 
                "<td class=\"row\">" + history.quantity + "</td>" +
                "<td class=\"row\"> $" + parseFloat(history.unitPrice).toFixed(2) + "</td>" + 
                "<td class=\"row\">" + history.purchaseDate + "</td>"                          
                );
            })
    },
    complete: function(data,status) { //optional, used for debugging purposes
    }
    
    });//end ajax history getReportInfo.php

    
    $.ajax({
    
        method: "GET",
        url: "api/getReportInfo.php",
        dataType: "json",
        data: { "action": "totalRevenue" },
        success: function(data,status) {
            data.forEach(function(totalRevenue){ totalRev += totalRevenue.quantity * totalRevenue.unitPrice})
            $("#totalRev").append(" $" + totalRev);
    },
    complete: function(data,status) { //optional, used for debugging purposes
    }
    
    });// end ajax totalRevenue getReportInfo.php
    
    $.ajax({
    
        method: "GET",
        url: "api/getReportInfo.php",
        dataType: "json",
        data: { "action": "totalItemsSold" },
        success: function(data,status) {
            $("#totalItems").append(" " + data[0].total);
    },
    complete: function(data,status) { //optional, used for debugging purposes
    }
    
    });// end ajax totalItemsSold getReportInfo.php       
    
    $.ajax({
    
        method: "GET",
        url: "api/getReportInfo.php",
        dataType: "json",
        data: { "action": "avgProductPrice" },
        success: function(data,status) {
            data.forEach(function(avgPro){ avgProduct += parseFloat(avgPro.productPrice) })
            totalProducts = data.length;
            avgProduct = avgProduct / totalProducts;
            $("#avgProduct").append(" $" + avgProduct.toFixed(2));
    },
    complete: function(data,status) { //optional, used for debugging purposes
    }
    
    });// end ajax avgProductPrice getReportInfo.php          
    
    $("#backButton").on("click",function(){
        window.location.replace("admin.php");
    });                        
});//documentReady        
