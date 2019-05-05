<?php
include '../../inc/dbConnection.php';

$conn = getDatabaseConnection("final_practice");

function displayLoginData(){
    global $conn;
    $sql = "SELECT * FROM fe_login";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    
    for ($i=0; $i < count($records); $i++) {
        
        echo $records[$i]['studentId'] ." " .  $records[$i]['username'] . "  "  . $records[$i]['failedAttempts'] . " " . $records[$i]['daysLeftPwdChange'] . "<br>";
        
    }
}

function displayLockedData(){
    global $conn;
    $sql = "SELECT * FROM fe_lock";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    
    for ($i=0; $i < count($records); $i++) {
        
        echo $records[$i]['studentId']."<br>";
        
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        
        
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    </head>
    <body>
         <form method="POST" action="loginProcess.php">
            
            Username: <input type="text" name="username" id="username"/> <br/>
            
            <div id='days'></div><br/>
            
            Password: <input type="password" name="password"/> <br/>
            
            <input type="submit" value="Login!" >
            
        </form>

        <div>
            
            <?= displayLoginData()  ?>
            
        </div>
        
        <div>
            
            <?= displayLockedData()  ?>
            
        </div>


<script>
    
    $("#username").on("change", function(){
      $.ajax({
                    type: "GET",
                    url: "api/changePswDays.php",
                    dataType: "json",
                    data:{"username": $("#username").val()},
                    success: function(data, status) {
                     // alert("got data");
                      if( data.daysLeftPwdChange == 0){
                          $('#days').html("You must change your password now!")
                      } else {
                        $('#days').html("You have " +data.daysLeftPwdChange + " to change your password");
                      }
                    
                    }
                });    
                
    });
    
</script>
    </body>
</html>