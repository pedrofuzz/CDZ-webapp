<?php
    require_once '../config/database.php';

    function retrieveUsers() {
        
        $con = connectDb();

        $sql = "SELECT * FROM user;";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function retrieveUser($email) {
        $con = connectDb();

        $sql = "SELECT * FROM user WHERE email='".$email."';";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function retrieveUserById($id) {
        $con = connectDb();

        $sql = "SELECT * FROM user WHERE id='".$id."';";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function insertUser($name, $email, $password) {
        $con = connectDb();

        $sql = "INSERT INTO user(name, email, password) VALUES ('".$name."', '".$email."', '".$password."');";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            return 0;
        } else {
            return 1;
        }

        mysqli_close($con);
    }

    function deleteUser($email) {
        $con = connectDb();

        $sql = "DELETE FROM user WHERE email=".$email.";";

        $result = mysqli_query($con, $sql);

        if(mysqli_affected_rows($con)==0) {
            return 0;
        } else {
            return 1;
        }

        mysqli_close($con);
    }
?>