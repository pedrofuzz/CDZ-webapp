<?php
    session_start();

    if(!isset($_SESSION['email'])) {
        header('Location: /cdz/views/login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pesquisa</title>
    <link rel="stylesheet" href="../css/profile.css">
    <?php
        require_once '../controllers/item.controller.php';
        require_once '../controllers/user.controller.php';
    
        $usr = mysqli_fetch_assoc(getUser($_SESSION['email']));
    
        if(!isset($_GET['key'])) {

            if(isset($_GET['cat_id'])) {
                $items = getItemsByCategory($_GET['cat_id']);
            } else {
                $items = NULL;
            }
        } else {
            $items = getItemsByKey($_GET['key']);
        }

        if(isset($_GET['key']) && $_GET['key'] === "") {
            $items = getItems();
        }
    ?>
</head>
<body>
    <div class="mainContainer">
        <div class="header">
            <a href="./home.php" class="logo">
                CDZ
            </a>

            <form method="GET" action="search.php" class="searchBar">
                <input type="text" class="searchInput" name="key" placeholder="Procurando alguma coisa?" />
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </form>

            <a href="./profile.php" class="account">
                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </a>
        </div>

        <div class="content">
            <h2>Encontrados...</h2>

            <div class='products'>
                <?php
                    if($items == NULL) {
                        echo "
                            <h3>Não foi encontrado nenhum produto!</h3>
                        ";
                    } else {
                        while($item = mysqli_fetch_assoc($items)) {
                            echo "
                                <div class='prod' onclick='window.location=`/cdz/views/item.php?id=".$item['id']."`;'>
                                    <img src='../images/".$item['thumb_url']."'>
                                    <p id='name'>".$item['name']."</p>
                                    <p id='desc'>".$item['description']."</p>
                                </div>
                            ";
                        }
                    }
                    
                ?>
            </div>
                
        </div>
    </div>
</body>
</html>