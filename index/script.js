{
    //Create array for all of the pads
    var padArray = document.getElementsByClassName("pad");

    padArray[0].onclick = function(){onclick(0)};
    padArray[1].onclick = function(){onclick(1)};

    function onClick(num) {
        console.log(num);
    }

    
}
