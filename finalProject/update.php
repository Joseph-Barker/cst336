<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!--Custom Styles-->        
        <link rel="stylesheet" href="css/admin.css">  

         <script>
                $.ajax({
                    type: "GET",
                    url: "api/getCategories.php",
                    dataType: "json",
                    success: function(data, status) {
                        data.forEach(function(key) {
                            $("#catId").append("<option value=" + key["catId"] + ">" + key["catName"] + "</option>");
                        });
                        getProductInfo();
                    }
                }); 
                
                
                 
            function getProductInfo() {    
                $.ajax({
                    type: "GET",
                    url: "api/getProductInfo.php",
                    dataType: "json",
                    data:{"productId": <?=$_GET['productId']?>},
                    success: function(data, status) {
                         $("#productName").val(data["productName"]);
                         $("#productDescription").val(data["productDescription"]);
                         $("#productPrice").val(data["productPrice"]);
                         $("#productImage").val(data["productImage"]);
                         $("#catId").val(data["catId"]).change();
                    }
                });
                
            }    
                
                $(document).ready(function(){  
                    
                    $("#submitButton").on("click",function(){
                        
                        $.ajax({
                            type: "GET",
                            url: "api/updateProductAPI.php",
                            dataType: "json",
                            data:{"productId": <?=$_GET['productId']?>,
                                "productDescription": $("#productDescription").val(),
                                "productPrice": $("#productPrice").val(),
                                "productName": $("#productName").val(),
                                "catId": $("#catId").val(),
                                "productImage": $("#productImage").val()
    
                            },
                            success: function(data, status) {
                                //$("#updated").html("Product Updated");
                            }
                            
                        });//end
                        $("#updated").html("Product Updated");
                    });
                    
                    $("#backButton").on("click",function(){
                        window.location.replace("admin.php");
                    });                
                    
                });//documentReady
                
                </script>
        
    <style>
                 
    </style>       
    </head>
    <body>
        
    <legend class="jumbotron"> Update Product</legend>
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
    <br />
    <button id="submitButton" class="btn btn-warning">Update Product</button>
    
    <span id="updated"></span>
     <br />
    <br />
    <button id="backButton" class="btn btn-default">Go back</button>    
    
    </body>
</html>