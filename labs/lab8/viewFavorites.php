<!DOCTYPE html>
<html>
    <head>
        <title> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <style>
    body {
    text-align: center;
    }
    img {
        border-radius: 20px;
        padding:15px;
    }
    .favorite{
        cursor: pointer;
    }
    #fav{
        font-size:90px;
    }
    
    </style>    
    <script>
       /*global $*/ 
        function displayFavorites(keywordLink) {
            //alert($(keywordLink).html())
            let keyword = $(keywordLink).html();
            $.ajax({
                method: "GET",
                url: "api/favoritesAPI.php",
                dataType: "json",
                data: { "action": "favorites", 
                        "keyword": keyword
                },
                success: function(data,status) {
                    $("#fav").html(" ")
                    data.forEach(function(i){
                        
                        $("#fav").append("<img width='200' src='" + i.imageURL + "'> ");
                    
                        
                    })
            },
            complete: function(data,status) { //optional, used for debugging purposes
            }
            
            });//ajax            
        }
        
        
        $(document).ready(function(){
            $.ajax({
            
                method: "GET",
                url: "api/favoritesAPI.php",
                dataType: "json",
                data: { "action": "keyword" },
                success: function(data,status) {
                    if(data[0].keyword != "") {
                        $("#keywords").html("| ");
                    }
                    data.forEach(function(keywords){
                        
                        $("#keywords").append("<a onclick='displayFavorites(this)' href='#'>" + keywords.keyword  +"</a> " + " | ");
                        //$("#keywords").append("<a class='favorites' href='#'>" + keywords.keyword  +"</a> ");
                        
                    })
            },
            complete: function(data,status) { //optional, used for debugging purposes
            }
            
            });//ajax
        
            //$("#keywords").append("<a class='favorites' href='#'>" + i.keyword + "</a> ");
        });//documentReady
    </script>
    
    </head>
    <body>

        <h1 class="jumbotron"> My Favorites </h1>
        <div id ="keywords" >No favorites :/</div>
        <br />    
        <form action="index.html">
            <button class="btn btn-primary btn-md"> Back to Search </button>
        </form>  
        <br />
        <div id="fav"></div>
    </body>
</html>