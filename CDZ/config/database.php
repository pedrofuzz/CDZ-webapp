<?php
    function connectDb() {
        $con = mysqli_connect("localhost", "root", "", "cdz");

        if($con->connect_error){
            die("Houve um erro ao conectar com o banco de dados!");
        } else {
            return $con;
        }

        return $con;
    }
?>