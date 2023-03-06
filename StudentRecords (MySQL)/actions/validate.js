//Submit if id, last, first, major, gpa all filled
function validateInsert(){
    if ( (document.getElementById("id").value != '') && (document.getElementById("last") != '') && (document.getElementById("first").value != '') 
        && (document.getElementById("major") != '') && (document.getElementById("gpa").value != '') ){
            document.getElementById("form").submit();
        }
    else{
        alert("You Have 1 or More Unfilled Entries")
    }
}

//Submit if id and at least one of last, first, major, gpa
function validateUpdate(){
    if ( (document.getElementById("id").value != '') && ((document.getElementById("last") != '') || (document.getElementById("first").value != '') 
        || (document.getElementById("major") != '') || (document.getElementById("gpa").value != '')) ){
            document.getElementById("form").submit();
        }
    else{
        alert("You Have 1 or More Unfilled Entries")
    }
}

//Submit if id entered
function validateDelete(){
    if (document.getElementById("id").value != ''){
            document.getElementById("form").submit();
        }
    else{
        alert("You Have 1 or More Unfilled Entries")
    }
}

//Submit if id or last or first fields
function validateView(){
    if ( (document.getElementById("id").value != '') || (document.getElementById("last") != '') || (document.getElementById("first").value != '') ){
            document.getElementById("form").submit();
        }
    else{
        alert("You Have 1 or More Unfilled Entries")
    }
}