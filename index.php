<?php
    session_start();

    if(isset($_SESSION['email'])) {
        header('Location: /cdz/views/home.php');
    } else {
        header('Location: /cdz/views/login.php');
    }
?>