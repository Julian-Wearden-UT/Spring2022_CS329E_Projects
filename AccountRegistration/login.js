function validate(){
    let username = document.getElementById("un").value;
    let password = document.getElementById("pwd").value;
    let repeatPassword = document.getElementById("rpwd").value;

    //Correct Flag
    let correct = true;

    //The username must be between 6 and 10 characters long, inclusive.
    if (username.length < 6 || username.length > 10)        {correct = false;}
    //The username must contain only letters and digits.
    else if (/^[A-Za-z0-9]+$/.test(username) === false)    {correct = false;}
    //The username cannot begin with a digit.
    else if (/^\d/.test(username) === true)               {correct = false;}
    //The password and the repeat password must match.
    else if (password !== repeatPassword)                   {correct = false;}
    //The password must be between 6 and 10 characters long, inclusive.
    else if (password.length < 6 || password.length > 10)   {correct = false;}
    //The password must contain only letters and digits.
    else if (/^[A-Za-z0-9]+$/.test(password) === false)    {correct = false;}
    //The password must have at least one lower case letter, at least one upper case letter, and at least one digit.
    else if (/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])[a-zA-Z0-9]+$/.test(password) === false) {correct = false;}

    //If failed to meet any criteria alert invalid
    if (correct === false) {alert("Invalid username or password");}
    //If passed all criteria alert validd
    else {alert("User validated")}
}