var puzzles = ["puzzle1", "puzzle2", "puzzle3"];
var images = ["img1", "img2", "img3", "img4", "img5", "img6", "img7", "img8", "img9", "img10", "img11", "img12"]

function randomPuzzle(){
    var choosePuzzle = Math.trunc (Math.random() * puzzles.length);
    let puzzle = document.getElementById(puzzles[choosePuzzle]);
    puzzle.style.visibility = "visible";
    shuffleArray(images);
}

function shuffleArray(array){
    for (let i = array.length - 1; i > 0; i--){
        let j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    displayImages();
}

function displayImages(){
    let offset = 400;
    for (let i = images.length - 1; i >= 0; i--){
        var elements = document.getElementsByClassName(images[i]);
            for ( let j = elements.length - 1; j >= 0; j--){
                elements[j].style.left = offset + "px";
                elements[j].style.top = 500 + "px";
            }
        offset = offset + 110;
    }
}


var theElement;
function grabber(event) {
    event.preventDefault();
    // Set the global variable for the element to be moved
    theElement = event.currentTarget;
    console.log(theElement);
 
    // Determine the position of the word to be grabbed, first removing the units from left and top
    posX = parseInt(theElement.style.left);
    posY = parseInt(theElement.style.top);
 
    // Compute the difference between where it is and where the mouse click occurred
    diffX = event.clientX - posX;
    diffY = event.clientY - posY;
 
    // Now register the event handlers for moving and dropping the word
    document.addEventListener("mousemove", mover, true);
    document.addEventListener("mouseup", dropper, true);
 
 }
 
 // The event handler function for moving the word
 function mover(event) {
    // Compute the new position, add the units, and move the word
    theElement.style.left = (event.clientX - diffX) + "px";
    theElement.style.top = (event.clientY - diffY) + "px";
 }
 
 // The event handler function for dropping the word
 function dropper(event) {
    // Unregister the event handlers for mouseup and mousemove
    document.removeEventListener("mouseup", dropper, true);
    document.removeEventListener("mousemove", mover, true);
 }
 