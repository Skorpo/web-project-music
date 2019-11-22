
    var buttons = document.getElementsByTagName("button");
    var buttonsCount = buttons.length;

    //Iterate through all buttons to get ID. Possibly can be optimized
    for (var i = 0; i <= buttonsCount; i += 1) {
        buttons[i].onclick = function(e) {
            //Parse the ID into an integer
            var pressedButton = (this.id.replace('pad','')-1);
            console.log(pressedButton);
            var audio = new Audio('http://tophat.sunywcc.edu/~webgroup2/default_sounds/Woosh-Mark_DiAngelo-4778593.wav');
            audio.play();
        };
    }   

  



