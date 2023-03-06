<?php
    session_start();

    // links to this page look like: ./login/user_session.php?page_key=3
    // this gets the "page_key" so it knows where to redirect after login
    if(isset($_GET['page_key'])){
        $_SESSION['page_number'] = $_GET['page_key'];
    }

    //if user does not have active login cookie go to login page
    if(!isset($_COOKIE['user_name'])){
        header("Location: login.html");
    }
    //otherwise go to page
    else{
        $story = $_SESSION['page_number'];
        header("Location: ../stories/story$story.html");
        session_destroy();
    }
?>