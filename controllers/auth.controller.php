<?php
    session_start();

    require_once '../config/database.php';
    require_once './user.controller.php';

    function authenticate ($email, $senha) {
        $con = connectDb();

        $sql = "SELECT email FROM user WHERE email = ".$email." AND password = ".$senha.";";

        $res = mysqli_query($con, $sql);

        if(mysqli_affected_rows($con)==0) {
            return 0;
        } else {
            return 1;
        }

        mysqli_close($con);
    }

    if(isset($_POST['login'])) {
        if(authenticate($_POST['email'], $_POST['senha'])) {
            $_SESSION['email'] = $_POST['email'];
            header('Location: /cdz/views/home.php');
        } else {
            unset($_SESSION['email']);
            unset($_POST['login']);
            header('Location: /cdz/views/login.php');
        }
    }

    if(isset($_POST['signin'])) {
        if(createUser($_POST['nome'], $_POST['email'], $_POST['senha'])) {
            header('Location: /cdz/views/login.php');
        } else {
            unset($_POST['signin']);
            header('Location: /cdz/views/register.php');
        }
    }

    if(isset($_GET['logout'])) {
        unset($_SESSION['email']);
        header('Location: /cdz/views/login.php');
    }
?>