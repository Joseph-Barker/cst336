<?php

include '../../inc/dbConnection.php';

$conn = getDatabaseConnection("final_practice");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM fe_login WHERE username = :username";
$arr = array();
$arr[":username"] = $username;


$stmt = $conn->prepare($sql);
$stmt->execute($arr);
$record = $stmt->fetch(PDO::FETCH_ASSOC); 
//print_r($record);
if (empty($record)) { //no username 
     
     echo "Username is  incorrect!";
     
     
 } 
 
 else { //username is found
     
     
     if($record["password"] == $password)
     {
         if  ($record['failedAttempts'] < 3){
            $sql = "UPDATE `fe_login` SET `failedAttempts` = '0' WHERE username = :username ";
            $arr2 = array();
            $arr2[":username"] = $username;
                    
            $stmt = $conn->prepare($sql);
            $stmt->execute($arr2);
        
            header('location: welcome.php'); //redirecting to a new file

         } 
     }
     else{
           $sql = "UPDATE `fe_login` SET `failedAttempts` = failedAttempts+1 WHERE username = :username ";
           $arr2 = array();
            $arr2[":username"] = $username;
                    
            $stmt = $conn->prepare($sql);
            $stmt->execute($arr2);
            
             echo "Password is  incorrect!";
             
             if ($record['failedAttempts'] == 2) {
                 $studentId = $record['studentId'];
                 $sql = "INSERT INTO `fe_lock` (`studentId`, `timestamp`) VALUES ($studentId, CURRENT_TIMESTAMP)";
                 $stmt = $conn->prepare($sql);
                 $stmt->execute();
                 
             }
        
     }
     
     
   
 
    
    

}



?>