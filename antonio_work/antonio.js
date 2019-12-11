var registered = false;
var tags=[];
var i = 0;
var tagAmount=20;
while(i < tagAmount){
  tags[i] = document.createElement("div");
  tags[i].className="tag";
  tags[i].innerHTML = "Name "+"|"+" Description";
  document.getElementById("menuBar").appendChild(tags[i]);
  i++;
}

var editMode = false;

document.onkeydown = function(e){
    e = e || window.event;
    var key = e.which || e.keyCode;
    if(key===16){
        if(editMode===true){
            editMode=false;
        }
        else{
            editMode=true;
        }
        console.log(editMode);
        changeLoaderVisibility(editMode);
    }
}

//Changes the visibiltiy of the 
function changeLoaderVisibility(visibility){
    if(visibility===true){
        document.getElementById("menuBar").style.display="inline-block";
        document.getElementById("blurContainer").style.backgroundColor="rgba(0,0,0,0.3)";
        document.getElementById("blurContainer").style.display="block";

    }
    else{
        document.getElementById("menuBar").style.display="none";
        document.getElementById("blurContainer").style.backgroundColor="rgba(0,0,0,0.0)";
        document.getElementById("blurContainer").style.display="none";

    }
}

//Changes the visibiltiy of the instructions
function changeInstructionVisibility(visibility){
    if(visibility===true){
        document.getElementById("instructionsMenu").style.display="inline-block";
    }
    else{
        document.getElementById("instructionsMenu").style.display="none";
    }
}

var instructionVisibility = false;

//toggles the visibilty of the instructions page, passed to changeInstructionVisibilty
function displayInstructions(){
if(instructionVisibility ===true){
    instructionVisibility=false;
}
else{
    instructionVisibility=true;
}
changeInstructionVisibility(instructionVisibility);
}

function checkRegister(){
if(registered===false){
    document.getElementById("registerModal").style.display="inline-block";
}
}

function closeRegisterModal(){
    document.getElementById("registerModal").style.display="none";
}

document.getElementById("recordButton").addEventListener('dblclick',function(e){
document.getElementById("recordModal").style.display="inline";
});

function saveBeat(){
    //Used when a beat is save
    document.getElementById("recordModal").style.display="none";
}