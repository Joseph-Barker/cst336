// Your JavaScript goes here
/* global $ */
var randomSeed = Math.floor(Math.random() * 99) + 1;
var guesses = document.querySelector('#guesses');
var lastResult = document.querySelector('#lastResult');
var lowOrHi = document.querySelector('#lowOrHi');
var winsHud = document.querySelector('#wins');
var lossesHud = document.querySelector('#losses');

var guessSubmit = document.querySelector("#test");
var guessField = document.querySelector('.guessField');

var guessCount = 1;
var resetButton = document.querySelector('#reset');
var userGuess = 'none'
var wins = 0;
var losses = 0;
resetButton.style.display = 'none';

var directions = document.querySelector('#directions');
var viewLeaderboard = false;
var leaderboard = document.querySelector('#leaderboard');
leaderboard.style.display = 'none';

guessField.focus();
//document.getElementById("numberToGuess").innerHTML = randomNumber;

function checkGuess(){
     userGuess = Number(guessField.value);
   
    if (userGuess > 99 || isNaN(userGuess)){
        lastResult.style.backgroundColor = 'yellow';
        lastResult.innerHTML = 'ERROR: Input must be a number between 1 and 99!';
        guessField.value = '';
        guessField.focus();
        return;
    }                
    if(guessCount === 1){
        guesses.innerHTML = 'Previous guesses: ' + userGuess;
    }else{
    guesses.innerHTML += ', ' + userGuess;
    }
    
    $.ajax({

        type: "GET",
        url: "api/ranNumber.php",
        dataType: "json",
        data: { "guess":$("#guessField").val(), "seed":randomSeed},
        success: function(data,status) {
            //alert(data.lower + " " + data.win + " " + data.ranNumber );
            if(data.win){
                wins += 1;
                lastResult.innerHTML = 'Congratulations! You got it right!';
                lastResult.style.backgroundColor = 'green';
                lowOrHi.innerHTML = '';
                winsHud.innerHTML = 'Wins: ' + wins; 
                setGameOver();
            } else if (guessCount === 7){
                losses += 1;
                lastResult.style.backgroundColor = 'red';
                lastResult.innerHTML = 'Sorry, you lost! The correct number was ' + data.ranNumber + '.';
                lossesHud.innerHTML = 'Losses: ' + losses;
                setGameOver();
            } else {
                lastResult.innerHTML = 'Wrong!';
                lastResult.style.backgroundColor = 'red';
                if(data.lower){
                    lowOrHi.innerHTML = 'Last guess was too low!';
                } else {
                    lowOrHi.innerHTML = 'Last guess was too hight!';
                }
            }
            guessCount++;
            guessField.value = '';
            guessField.focus();                    
        },
        complete: function(data,status) { //optional, used for debugging purposes
        //alert(status);
        }
    
    });//ajax  
}    
guessSubmit.addEventListener('click', checkGuess);
function setGameOver(){
    guessField.disabled = true;
    guessSubmit.disabled = true;
    resetButton.style.display = 'inline';
    resetButton.addEventListener('click', resetGame);
}
function resetGame(){
    guessCount = 1;
    
    var resetParas = document.querySelectorAll('.resultParas p');
    for (var i = 0; i < resetParas.length; i++ ){
        resetParas[i].textContent = '';
    }
    resetButton.style.display = 'none';
    
    guessField.disabled = false;
    guessSubmit.disabled = false;
    guessField.value = '';
    guessField.focus();
    
    lastResult.style.backgroundColor = 'white';
    
    randomSeed = Math.floor(Math.random() * 99) + 1;
}

$("#viewLearder").on( "click", function() {
        if(viewLeaderboard == false) {
            $("#viewLearder").html("back to game");
            directions.style.display = 'none';
            leaderboard.style.display = '';
            viewLeaderboard = true;
            
            $.ajax({
        
                type: "GET",
                url: "api/gameScores.php",
                dataType: "json",
                success: function(data,status) {
                    for (var i = 1; i <= data.length; i++ ){
                        $("#Rank" + i).html("#" + i);
                        $("#Name" + i).html(data[(i - 1)].name);
                        $("#Wins" + i).html(data[(i - 1)].wins);
                        $("#Losses" + i).html(data[(i - 1)].losses);
                    }

                },
                complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
                }
            
            });//ajax            
        
        } else {
            $("#viewLearder").html("view leaderboard");
            directions.style.display = '';
            leaderboard.style.display = 'none';
            viewLeaderboard = false;
        }    
});