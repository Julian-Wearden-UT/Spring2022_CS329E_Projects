<?php
    session_start();
    //If user does not have active login cookie go to login page
    if(!isset($_SESSION['user_name'])){
        header("Location: login.html");
        $_SESSION['correct'] = 0;  //array to store user's answers
    }

    //If time has run out
    else if(isset($_SESSION['user_name']) && !isset($_COOKIE['user_name'])){
        header("Location: ./finalize.php?fin_key=1");
    }

    // Go to next Question
    else if(isset($_GET['page_key'])){
        $question = (int)$_GET['page_key'] + 1;
        if ($question < 7){
            header("Location: ../Questions/q$question.html");
        }
        //Or finalize grade. Kill Session
        else{
            header("Location: ./finalize.php");
        }        
    }

    //Failsafe. Restart.
    else{
        if (isset($_COOKIE['user_name'])) {
            unset($_COOKIE['user_name']);
            setcookie('user_name', '', time() - 3600, '/');
        }
        session_destroy();
        header("Location: ./user_session.php");
    }
    
?>