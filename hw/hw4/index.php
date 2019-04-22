<!DOCTYPE html>
<html>
    <head>
        <title> Email Verifier API Demo </title>
        <meta charset="utf-8" />
        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--Bootstrap files-->        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--Custom Styles-->        
        <link rel="stylesheet" href="css/styles.css">
    <script>
            /*global $*/ 
            /*global location*/
        $(document).ready(function() {
                var disabled = true;
                    
            $.ajax({
            
                method: "GET",
                url: "api/getEmails.php",
                dataType: "Json",
                success: function(data,status) {
                //alert(data[0].email_address);
                data.forEach(function(data){
                $("#email_list").append("<div class='row'>" +  data.email_address +             
                    "</div><br>");
                    })           
                },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);
                }
            
            });//ajax                
                
                $("#email_input").on("click", function(){ 
                    $("#submit").attr("class", "btn btn-primary disabled");                    
                    disabled = true;
                }); //end               
                
                $("#email_input").change(function() {
                    $("#email_feedback").html("Analyzing...");
                    $("#email_feedback").css("color", "black");                    
                    $.ajax({
                        type: "GET",
                        url: "api/verifier.php",
                        dataType: "json",
                        data: {"email": $("#email_input").val() },
                        success: function(data,status) {
                            if (data.status === true) {
                                $("#email_feedback").html( data.domain + " is a valid domain or MX server");                                        
                                $("#email_feedback").css("color", "green");
                                $("#submit").attr("class", "btn btn-primary active");
                                disabled = false;
                                
                            } else {
                                $("#email_feedback").html( data.error['message'] );                                
                                $("#email_feedback").css("color", "red");
                                $("#submit").attr("class", "btn btn-primary disabled");
                                disabled = true;
                            }
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });//ajax
                    
                }); //email check        
        
                 $("#submit").on("click", function(){
                    if (!disabled) {
                        $.ajax({
                            type: "GET",
                            url: "api/addEmail.php",
                            dataType: "json",
                            data: {"email": $("#email_input").val(),
                                    "status": $("#email_feedback").text()},
                            success: function(data,status) {
                            
                                
                            },
                            complete: function(data,status) { //optional, used for debugging purposes
                            //alert(status);
                                location.reload();
                            }
                        
                        });//ajax
                    }    
                }); //addEmail            
        
            
        });//documentReady
    </script>
    </head>
    <body>
        <legend class="jumbotron">  Email Verifier</legend>
            <div id = "body">
                    Enter Email:<br /> 
                <input type="text" id="email_input" name="email_input" /> <br />
                <span id="email_feedback" class="error"></span> <br />
                <br />
                <button id="submit" class="btn btn-primary disabled">Submit</button>
                <br />                
                <br />
                <div id="email_list"><h2> Verified Email Addresses </h2> 
                <br />
                </div> 
            <br />
            <br />
            <br />
            <br />
            <br />
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