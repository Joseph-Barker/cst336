<!DOCTYPE html>
<html>
    <head>
        <title> Product Information </title>
        <link rel="stylesheet" href="css/products.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        <script>
            $(document).ready( function(){    
                
                  $.ajax({
                        type: "GET",
                        url: "api/getProductInfo.php",
                        dataType: "json",
                        data:{"productId": <?=$_GET['productId']?>},
                        success: function(data, status) {
                             $("#productName").html(data["productName"]);
                             $("#productDescription").html(data["productDescription"]);
                             $("#productPrice").html("$"+data["productPrice"]);
                             $("#productImage").attr("src", data["productImage"]);
                        }
                    });
                
            });            
        </script>
        <link rel="stylesheet" href="css/styles.css"> 
    </head>
    <body>
<div class="banner"><img src="img/lateralSword.png" /></div>        
        
        <h2 id="productName"></h2>

        <h3 id="productDescription"></h3>
        
        <div id="productPrice"></div>

        <img src="" id="productImage" width="200"/>

    </body>
</html>