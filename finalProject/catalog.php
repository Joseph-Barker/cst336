<!DOCTYPE html>
<html>
    <head>
        <title> Catalog </title>
        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--Bootstrap files-->        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--Custom Styles-->        
        <link rel="stylesheet" href="css/styles.css">    
        
        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Alike+Angular" rel="stylesheet"> 
        
        <script type="text/javascript" src="js/catalogScript.js"></script>
    </head>
    <body>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a class="active" href="catalog.php">Catalog</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
        <div class="banner"><span class="title"> Medieval Solutions </span><img src="img/lateralSword.png" /></div> 
        <div class="container">
            <div id="searchParam">
                <h1 id="catalogHead">Catalog</h1>
                <form>
                    
                    <div class="paramCont">
                        <span>Item Name</span>
                        <input type="text" name="product"/>
                    </div>
                    <div class="paramCont">
                        <span>Item Type</span>
                        <select name="type_list">
                            <option value="">Select One</option>
                        </select>
                    </div>
                    <div class="paramCont">
                        <p>Price</p>
                        <span>From </span>
                        <input type="text" name="priceFrom" size="7"/>
                        <span>To </span>
                        <input type="text" name="priceTo" size="7"/>
                    </div>
                    <div class="paramCont">
                        <p>Order result by:</p>
                        <input type="radio" name="orderBy" value="price"/>
                        <span>Price</span>
                        <br>
                        <input type="radio" name="orderBy" value="name"/>
                        <span>Name</span>
                        <br><br>
                    </div>

                </form>
                <button id="searchForm">Search</button>
            </div>
        </div>
        
        <div class="container">
            <table id="results"></table>
        </div>

    </body>
</html>