<?php
    session_start();
# get the incoming information
    $name = $_POST["loginUser"];
    $password = $_POST["loginPass"];
    $loginValid = FALSE;

    // open file to see if username is taken
    $file = fopen ("./passwd.txt", "r");
    $temp_string = "Username: $name; Password: $password;";   // temp string wfith username
    while(!feof($file)){
        $temp_line = fgets($file);
        if (strpos($temp_line, $temp_string) !== false){
            $loginValid = TRUE;
        }
    }
    fclose($file);


    if ($loginValid === True){
        setcookie("user_name","$name",time()+120,"/");
        $story = $_SESSION['page_number'];
        header("location: user_session.php?page_key=$story");
    }
    //if username is not taken
    else{
        print <<<INVALID
        <h1>Invalid Login</h1>
        <p>Please try again: <a href=login.html>Login</a></p>
        <p>Or if you don't have an account: <a href=./register.html>Register</a></p>
INVALID;
    }
?>