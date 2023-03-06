
function submit_form(){
    if ((document.getElementById("1a").checked || document.getElementById("1b").checked) &&
        (document.getElementById("2a").checked || document.getElementById("2b").checked) &&
        (document.getElementById("3a").checked || document.getElementById("3b").checked || document.getElementById("3c").checked || document.getElementById("3d").checked) &&
        (document.getElementById("4a").checked || document.getElementById("4b").checked || document.getElementById("4c").checked || document.getElementById("4d").checked) &&
        valid("5a") && valid("6a")){
        document.getElementById("form").submit();
    }
    else{
        alert('You have unanswered questions');
    }
}

function valid(id) {
    var textVal=document.getElementById(id).value;
    return textVal.match(/\S/);
}