<?php
    // if (isset($_COOKIE['user_name'])) {
    //     unset($_COOKIE['user_name']);
    //     setcookie('user_name', '', time() - 3600, '/');
    // }
    // session_destroy();

    session_start();
# get the incoming information
    $name = $_POST["loginUser"];
    $password = $_POST["loginPass"];
    $loginValid = FALSE;

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

    if ($loginValid === TRUE){
        setcookie("user_name","$name",time() + (10 * 365 * 24 * 60 * 60),"/");
        $_SESSION['user_name'] = "$name";
        header("location: actions.html");
    }
    else{
        echo "<script>
                window.location.href='./login.html'
                alert('Login Failed')
            </script>";
    }
?>