<!DOCTYPE html>
<html>
    <head>
        <title> Lab 9: File Upload </title>
        <meta charset="utf-8" />
        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--Bootstrap files-->        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--Custom Styles-->        
        <link rel="stylesheet" href="css/styles.css">        
        <style>
            
            img { padding: 10px; }
            
            img:hover { width: 250px; }
            
        </style>
    </head>
    <legend class="jumbotron">Image Gallery</legend>
    <body>
        <div id = "body"> 
        
        <form  method="POST" enctype="multipart/form-data">
        
            <input id="inputB" type="file" name="myFile" class="btn btn-default" />
            <button id="uploadedB" class="btn btn-success"> Upload File! </button> 
            
        </form><span id="feedback">
            <?php
            
             if (!empty($_FILES)) {
            
                if( $_FILES['myFile']['size'] < 1000000){
                    move_uploaded_file( $_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name']);
                } else {
                    echo "file size is to big!";
                }
            
            }
                function displayImagesUploaded() {
            
                    $images = scandir("gallery"); //returns all file names within a folder
                    
                    //print_r($images);
                    
                    for ($i = 2; $i < count($images); $i++) {
                        
                        echo "<img src='gallery/$images[$i]' width='100' />";
                        
                    }//for
                
                }//function
            
            
            ?>            
        </span>

        <hr>
        <h3> Images uploaded: </h3>
        </div> 
        <div id="gallery">
            <?= displayImagesUploaded() ?>        
        </div>
            <div id = "footer">
                <hr width="50%">
                &copy; 2019. Joseph Barker - CST 336 Internet Programming <br />
                <strong>Disclaimer:</strong> The content of this page is fake. It's only for educatiol purposes.</strong>
                <br>
                <img src="../../img/CSUMB_Logo.jpg" alt = "CSUMB Logo" />
                <img src="../../img/buddy_verified.png"
            </div>             
        </div>   
    </body>
</html>