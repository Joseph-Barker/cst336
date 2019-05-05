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
        <title> Admin Section </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--Custom Styles-->        
        <link rel="stylesheet" href="css/admin.css">
        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Alike+Angular" rel="stylesheet">
        <script type="text/javascript" src="js/adminPage.js"></script>
    </head>
    <body>

        <h1 class="jumbotron"> Medieval Solutions - Admin Section </h1>

        Welcome <?=$_SESSION['adminName']?>
        
        <br><hr><br>
        
        <form action="addProducts.php">
            <button class="btn btn-warning">Add New Product</button>
        </form>
        
        <form action="reports.php">
            <button class="btn btn-primary">Report</button>
        </form>    
        
        <form action="logout.php">
            <button class="btn btn-outline-danger">Logout</button>
        </form>
        
        <br><br>
        
         <div id="products"></div>
     
     
<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Product Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="productIframe"  width="400" height="400"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


    </body>
</html>