/*global $*/
function confirmDelete(){
    
    return confirm("Are you sure you want to delete this product?");
    
}

function openModal(){
    $('#productModal').modal("show"); //opens the modal
}

$(document).ready(function(){

    //Gets first 10 products from the database and displays them
    $.ajax({

        type: "GET",
        url: "api/getProduct.php",
        dataType: "json",
        success: function(data,status) {
          //alert(data[0].productName);
          data.forEach(function(product){
              $("#products").append("<div class='row'>" + 
                                    "<div class='col1'>" + 
                                    "<a class=\"btn btn-primary\"  href='update.php?productId="+product.productId+"'> Update </a>" +
                                    //"[<a href='delete.php?productId="+product.productId+"'> Delete </a>]" +
                                    "<form action='delete.php' method='post' onsubmit='return confirmDelete()'>"+
                                    "<input type='hidden' name='productId' value='"+ product.productId + "'>" +
                                    "<button class=\"btn btn-outline-danger\">Delete</button></form>" +
                                    "<a target='productIframe' onclick='openModal()' href='productInfo.php?productId="+product.productId+"'> " + product.productName + "</a></div>"+
                                    "<div class='col2'>"+"$" + product.productPrice + "</div>"+
                                    "</div><br>");
          })
        },
        complete: function(data,status) { //optional, used for debugging purposes
        //alert(status);
        }
        
    });//ajax
    
   
    
});//documentReady
