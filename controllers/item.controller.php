<?php
    require_once '../models/item.model.php';

    function getItems() {
        return retrieveItems();
    }

    function getItemsByUser($user_id) {
        return retrieveItemsByUser($user_id);
    }

    function getItem($id) {
        return retrieveItem($id);
    }

    function getItemsByKey($key) {
        return retrieveItemsByKey($key);
    }

    function getItemsByCategory($category_id) {
        return retrieveItemsByCategory($category_id);
    }

    function createItem($user_id, $category_id, $name, $thumb_url, $desc) {
        return insertItem($user_id, $category_id, $name, $thumb_url, $desc);
    }

    function removeItem($id) {
        return deleteItem($id);
    }

    $url_imagens = '../images';

    if(isset($_GET['newArticle'])) {
        
        if(!file_exists($url_imagens)) {
            mkdir($url_imagens);
        }

        $nome_arquivo = time().'_'.$_FILES['thumb']['name'];

        if(!move_uploaded_file($_FILES['thumb']['tmp_name'], $url_imagens . '/' .$nome_arquivo)) {
            echo "Houve um erro ao cadastrar imagem, tente novamente!";
        }

        if(createItem($_GET['user_id'], $_POST['category'], $_POST['name'], $nome_arquivo, $_POST['desc'])) {
            unset($_GET['newArticle']);
            header('Location: /cdz/views/profile.php');
        } else {
            echo "Houve um erro, tente novamente!";
        }
    }

?>