var gameBoard = [
    ["", "", "", ""],
    ["", "", "", ""],
    ["", "", "", ""],
    ["", "", "", ""]
];
var charValues = [];
var tries = 0;
var clickedID1 = "";
var clickedID2 = "";
var numberOfClicks = 0;


function main(){
    randomizeChars();
    buildGameBoard(charValues);
    populateButtons();
    console.log(gameBoard);
}
function randomizeChars() {
    const possibleChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (let i = 0; i < 8; i++){
        let chosenChar = possibleChars.charAt(Math.floor(Math.random() * possibleChars.length));
        if (!charValues.includes(chosenChar)){
            charValues.push(chosenChar);
            charValues.push(chosenChar);
        }
        else{
            i = i - 1;
        }
    }
    charValues = charValues.sort((a, b) => 0.5 - Math.random());
}
function buildGameBoard(charValues){
    for(let i=0; i<4; i++) {
        for (let j = 0; j < 4; j++){
            gameBoard[i][j] = charValues[(i * 4) + j];
        }
    }
}
function populateButtons(){
    for(let i=0; i<4; i++) {
        for (let j = 0; j < 4; j++) {
            document.getElementById("s"+i+j).innerHTML = gameBoard[i][j];
        }
    }
}

function matchID(ID1, ID2){
    console.log(ID1);
    console.log(ID2);
    if (ID1 !== "" && ID2 !== "") {
        return document.getElementById(ID1).innerHTML === document.getElementById(ID2).innerHTML;
    }
    else {
        return false;
    }
}
function checkClicks(ID){
    if (numberOfClicks < 2){
        if (clickedID1 === ""){
            clickedID1 = ID;
            numberOfClicks = numberOfClicks + 1;
            console.log("No of Clicks(1)", numberOfClicks);
            console.log("Stored IDs (1)", clickedID1, clickedID2);
        }
        else{
            clickedID2 = ID;
            numberOfClicks = numberOfClicks + 1;
            console.log("No of Clicks(2)", numberOfClicks);
            console.log("Stored IDs (2)",clickedID1, clickedID2);
        }
    }

}

function clearClicks(){
    console.log("clear", 0, clickedID1, 1, clickedID2);
    clickedID1 = "";
    clickedID2 = "";
}



$(document).ready (function () {
    $("span").hide();

    $("button").click(function() {
        if (numberOfClicks < 2) {
            checkClicks($(this).find('span').attr('id'));
            $(this).find('span').fadeIn(1500);
            console.log("Click", numberOfClicks);
            if (numberOfClicks  1 && !(matchID(clickedID1, clickedID2))) {
                $(this).find('span').fadeOut(1500);
            }
            else if (matchID(clickedID1, clickedID2)){
                console.log("success");
                $("#" + clickedID1).show();
                $("#" + clickedID2).show();
            }
            else{
                $(this).find('span').fadeOut(1500);
            }
        }
    });
});