<?php
    print_r($_file)
?>


<!DOCTYPE html>
<html>
    <head>
        <title> File Upload </title>
    </head>
    <body>
        <h1>File Upload</h1>
        
        <form method="POST" enctype="multipart/form-data"> 
            Select file: <input type="file" name="fileName" /> <br />
            <input type="submit"  name="uploadForm" value="Upload File" /> 
        
        </form>


    </body>
</html>