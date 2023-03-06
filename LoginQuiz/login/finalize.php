<?php
    session_start();

    if(isset($_GET['fin_key'])){
        $reason = $_GET['fin_key'];
    }

    if ($reason == 1){
        $score = $_SESSION['correct'];
        print <<< TIMEOUT
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Feedback Form</title>
            <meta charset="UTF-8">
            <meta name="description" content="Campus Visit Feedback Form">
            <meta name="author" content="Julian Wearden">
        </head>
        <body>
            <h1>Your Time is Up!</h1>
            <h1>You Scored $score/60</h1>
        </body>
        </html>
TIMEOUT;
    }
    else{
        $score = $_SESSION['correct'];
        print <<< SCORE
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Feedback Form</title>
            <meta charset="UTF-8">
            <meta name="description" content="Campus Visit Feedback Form">
            <meta name="author" content="Julian Wearden">
        </head>
        <body>
            <h1>You Scored $score/60</h1>
        </body>
        </html>
SCORE;
    }


    if (isset($_COOKIE['user_name'])) {
        unset($_COOKIE['user_name']);
        setcookie('user_name', '', time() - 3600, '/');
    }
    session_destroy();

?>