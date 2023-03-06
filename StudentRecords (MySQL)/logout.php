<?php
    session_start();
    if (isset($_COOKIE['user_name'])) {
        unset($_COOKIE['user_name']);
        setcookie('user_name', '', time() - 3600, '/');
    }
    session_destroy();
    echo "<script>
            alert('Thank You')
        </script>";
?>