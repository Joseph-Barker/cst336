           // Your JavaScript goes here
          
            var randomNumber = Math.floor(Math.random() * 99) + 1;
            var guesses = document.querySelector('#guesses');
            var lastResult = document.querySelector('#lastResult');
            var lowOrHi = document.querySelector('#lowOrHi');
            var winsHud = document.querySelector('#wins');
            var lossesHud = document.querySelector('#losses');
            
            var guessSubmit = document.querySelector('.guessSubmit');
            var guessField = document.querySelector('.guessField');
            
            var guessCount = 1;
            var resetButton = document.querySelector('#reset');
            var userGuess = 'none'
            var wins = 0;
            var losses = 0;
            console.log(randomNumber);
            resetButton.style.display = 'none';
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
                if(userGuess === randomNumber){
                    wins += 1;
                    lastResult.innerHTML = 'Congratulations! You got it right!';
                    lastResult.style.backgroundColor = 'green';
                    lowOrHi.innerHTML = '';
                    winsHud.innerHTML = 'Wins: ' + wins; 
                    setGameOver();
                } else if (guessCount === 7){
                    losses += 1;
                    lastResult.style.backgroundColor = 'red';
                    lastResult.innerHTML = 'Sorry, you lost! The correct number was ' + randomNumber + '.';
                    lossesHud.innerHTML = 'Losses: ' + losses;
                    setGameOver();
                }else{
                    lastResult.innerHTML = 'Wrong!';
                    lastResult.style.backgroundColor = 'red';
                    if(userGuess < randomNumber){
                        lowOrHi.innerHTML = 'Last guess was too low!';
                    }else if (userGuess > randomNumber){
                        lowOrHi.innerHTML = 'Last guess was too hight!';
                    }
                }
                guessCount++;
                guessField.value = '';
                guessField.focus();
                
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
                
                randomNumber = Math.floor(Math.random() * 99) + 1;
            }