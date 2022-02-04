<?php
    require_once '../config/database.php';

    function retrieveItems() {
        
        $con = connectDb();

        $sql = "SELECT * FROM item;";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function retrieveItemsByKey($key) {
        
        $con = connectDb();

        $sql = "SELECT * FROM item WHERE name LIKE '%".$key."%' OR description LIKE '%".$key."%' ;";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo $con->error;
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function retrieveItemsByCategory($category_id) {
        
        $con = connectDb();

        $sql = "SELECT * FROM item WHERE category_id = '".$category_id."';";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo $con->error;
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function retrieveItemsByUser($user_id) {
        $con = connectDb();

        $sql = "SELECT * FROM item WHERE user_id = ".$user_id.";";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function retrieveItem($id) {
        $con = connectDb();

        $sql = "SELECT * FROM item WHERE id= ".$id.";";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function insertItem($user_id, $category_id, $name, $thumb_url, $desc) {
        $con = connectDb();

        $sql = "INSERT INTO item(user_id, category_id, name, thumb_url, description) VALUES (".$user_id.", '".$category_id."', '".$name."', '".$thumb_url."', '".$desc."');";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            return 0;
        } else {
            return 1;
        }

        mysqli_close($con);
    }

    function deleteItem($id) {
        $con = connectDb();

        $sql = "DELETE FROM item WHERE id='{$id}';";

        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) == 1) {
            return 1;
        } else {
            return 0;
        }

        mysqli_close($con);
    }

?>