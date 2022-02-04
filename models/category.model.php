<?php 
    require_once '../config/database.php';

    function retrieveCategories() {
            
        $con = connectDb();

        $sql = "SELECT * FROM category;";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function retrieveCategory($id) {
        $con = connectDb();

        $sql = "SELECT * FROM category WHERE id= ".$id.";";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }
?>