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
        <title> Admin Reports </title>
        <meta charset="utf-8" />
        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--Bootstrap files-->        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--Custom Styles-->        
        <link rel="stylesheet" href="css/report.css">    
        <script type="text/javascript" src="js/reportInfo.js"></script>
    <style>
            body {
              text-align: center;
            }        
            h2{
                text-align: center;
            }
    </style>    
    </head>
    <body>
        <legend id = "header" class="jumbotron">  Admin Report</legend>        
        <br />
        <br />
        <button id="backButton" class="btn btn-default">Go back</button>         
        <br />
        <h2>[Transaction History]</h2>
        <br />
        <table id = repTable>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Purchase ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Purchase Date</th>                
                
            </tr>
        </table>
        <br />
        
        <div id="summary"><h2> Summary </h2> 
        <br />        
        <div id = "avgProduct">
            Average Product Price:
        </div>         
         <br />
         <div id = "totalItems">
            Total Products Sold:
        </div>       
        <br />
        <div id = "totalRev">
            Total Revenue:
        </div>         
        <br />        
        </div>         
    </body>
</html>