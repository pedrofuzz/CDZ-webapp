<?php
    require_once '../models/user.model.php';

    function getUser($email) {
        return retrieveUser($email);
    }

    function getUserById($id) {

        return retrieveUserById($id);
    }

    function getUsers() {
        
        return retrieveUsers();
    }

    function createUser($nome, $email, $senha) {
        if(insertUser($nome, $email, $senha)) {
            return 1;
        } else {
            return 0;
        }
    }

    function removeUser($email) {
        return deleteUser($email);
    }

?>