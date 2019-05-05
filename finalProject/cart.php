<!DOCTYPE html>
<html>
    <head>
        <title> Cart </title>
        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--Bootstrap files-->        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--Custom Styles-->        
        <link rel="stylesheet" href="css/styles.css">
        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Alike+Angular" rel="stylesheet"> 
        <!--Javascript-->
        <script type="text/javascript" src="js/cartScript.js"></script>
    </head>
    <body>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="catalog.php">Catalog</a></li>
          <li><a class="active" href="cart.php">Cart</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
        <div class="banner"><span class="title"> Medieval Solutions </span><img src="img/lateralSword.png" /></div> 
        
        <div class="container">
            <div id="cartEmpty"></div>
            <table id="productsPurchased"></table>
        </div>
    </body>
</html>