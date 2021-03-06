<?php
session_start();

//checks whether user has logged in
if (!isset($_SESSION['adminName'])) {
    
    header('location: login.php'); //sends users to login screen if they haven't logged in
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!--Custom Styles-->        
        <link rel="stylesheet" href="css/admin.css"> 
  
    </head>
    
    
    <body>
        
        <legend class="jumbotron">Add new product</legend>
        Enter Product Name:<input type="text" id = "productName" size="50">
        <br>
        Enter Product Description: <textarea id="productDescription" cols="40" rows="3"></textarea>
        <br>
        Product Image:<input type = "text" id = "productImage">
        <br/>
        Product Price: <input type="text" id="productPrice">
        <br/>
        Categories Name: <Select id = "catId">
        <Option> Select One </Option>
        </Select><br>
        
      <button id="submitButton" class="btn btn-warning">Add Product</button>
        <span id="totalProducts"></span>
        <br />
        <br />
        <button id="backButton" class="btn btn-default">Go back</button> 
    </body>
    <script>
        $.ajax({
                    type: "GET",
                    url: "api/getCategories.php",
                    dataType: "json",
                    success: function(data, status) {
                        data.forEach(function(key) {
                            $("#catId").append("<option value=" + key["catId"] + ">" + key["catName"] + "</option>");
                        });
                    }
                }); 
                
        $("#submitButton").on("click", function(){
                   //alert("test");
                   $.ajax({
                    type: "GET",
                    url: "api/addProductAPI.php",
                    dataType: "json",
                    data : {"productName": $("#productName").val(),
                        "productDescription": $("#productDescription").val(),
                        "productImage": $("#productImage").val(),
                        "productPrice": $("#productPrice").val(),
                        "catId": $("#catId").val()
                    },
                    success: function(data, status) {
                        $("#totalProducts").html(data.totalproducts + " Products");
                    }
                }); 
        });
        $("#backButton").on("click",function(){
            window.location.replace("admin.php");
        });    
    </script>
    
</html>