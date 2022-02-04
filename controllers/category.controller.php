<?php
    require_once '../models/category.model.php';

    function getCategories() {
        return retrieveCategories();
    }

    function getCategory($id) {
        return retrieveCategory($id);
    }
?>