<?php
    session_start();    //session used to keep page number for redirect
    $name = $_POST["user"]; //store input username
    $password = $_POST["pass1"];    //store input password

    $usernameValid = TRUE;  // valid username flag

    // open file to see if username is taken
    $file = fopen ("./passwd.txt", "r");
    $temp_string = "Username: $name;";   // temp string wfith username
    while(!feof($file)){
        $temp_line = fgets($file);

        if (strpos($temp_line, $temp_string) !== false){
            $usernameValid = FALSE;
        }
    }
    fclose($file);


    //if username is taken
    if ($usernameValid === FALSE){
        print <<<INVALID
        <h1>This username is taken.</h1>
        <p>Please try again: <a href=register.html>Register</a></p>
INVALID;
    }
    //if username is not taken
    else{
        # open file 'passwd.txt' and append the username and password
        if ($fh = fopen("./passwd.txt", "a")) {
            fwrite($fh, "Username: $name; Password: $password;\n");
            fclose($fh);
        }
        setcookie("user_name","$name",time()+120,"/");  //set cookie for user
        $story = $_SESSION['page_number'];
        header("location: user_session.php?page_key=$story"); //redirect page number back so user_session knows which site to open
    }

?>