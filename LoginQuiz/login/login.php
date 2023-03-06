<?php
    if (isset($_COOKIE['user_name'])) {
        unset($_COOKIE['user_name']);
        setcookie('user_name', '', time() - 3600, '/');
    }
    session_destroy();

    session_start();
# get the incoming information
    $name = $_POST["loginUser"];
    $password = $_POST["loginPass"];
    $loginValid = FALSE;
    $firstLogin = FALSE;

    // open file to see if login valid
    $file = fopen ("./passwd.txt", "r");
    $temp_string = "$name:$password";   // temp string with username
    while(!feof($file)){
        $temp_line = fgets($file);
        if (strpos($temp_line, $temp_string) !== false){    //if username:password in file approve
            $loginValid = TRUE;
        }
    }
    fclose($file);

    // open file to see if logged in before
    $file = fopen ("./results.txt", "r");
    $temp_string = "$name:";   // temp string with username
    while(!feof($file)){
        $temp_line = fgets($file);
        if (strpos($temp_line, $temp_string) !== false){    //if username: in file, user has logged in before
            $firstLogin = FALSE;
            break;
        }
        else{
            $firstLogin = TRUE;
        }
    }
    fclose($file);


    if ($loginValid === TRUE && $firstLogin == TRUE){
        setcookie("user_name","$name",time()+900,"/");
        $_SESSION['user_name'] = "$name";
        $_SESSION['current_question'] = 0;
        header("location: user_session.php?page_key=0");
    }
    else{
        if($loginValid === FALSE){
            print <<<INVALID
            <h1>Invalid Login</h1>
            <p>Please try again: <a href=login.html>Login</a></p>
INVALID;
        }
        else if($firstLogin == FALSE){
            print <<<TAKEN
            <h1>You have already completed this quiz.</h1>
            <p>Try again: <a href=login.html>Login</a></p>
TAKEN;
        }
    }
?>