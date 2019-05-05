<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Login </title>
        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--Bootstrap files-->        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--Custom Styles-->        
        <link rel="stylesheet" href="css/login.css">        
        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Alike+Angular" rel="stylesheet"> 
    </head>
    <body>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="catalog.php">Catalog</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li><a class="active" href="login.php">Login</a></li>
        </ul>
        <div class=".bannerAdmin">
        <legend class="jumbotron" > Admin Login </legend>
        </div>
        <form id = "body" method="POST" action="loginProcess.php">
            
            Username: <input type="text" name="username" id="username"/> <br/>
            <br />            
            
            Password: <input id = "pw" type="password" name="password"/> <br/>
            <div id = "passwordError" ></div>
            <br />            
            
            <!-- <input type="submit" value="Login!" > -->
            
            <button id = "submitBtn" class="btn btn-primary" type="submit" value="Login!" > Login </button>
            <?=$_SESSION['error']?>
        </form>
    </body>

</html>        