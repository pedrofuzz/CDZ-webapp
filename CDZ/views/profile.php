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
    <title>Perfil</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css/profile.css">
    <?php
        require_once '../controllers/item.controller.php';
        require_once '../controllers/user.controller.php';
        require_once '../controllers/category.controller.php';

        if(isset($_GET['email'])){
            $email = $_GET['email'];
        } else{
            $email = $_SESSION['email'];
        }
    
        $usr = mysqli_fetch_assoc(getUser($email));
    
        $items = getItemsByUser($usr['id']);

        $categories = getCategories();
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
            <h2>Artigos de <?php echo $usr['name'] ?></h2>

            <div class="menu">
                <?php
                if(isset($_GET['email'])) {
                    if($_SESSION['email'] == $_GET['email']){
                        echo "<div class='add' onclick='document.getElementById(`id01`).style.display=`block`'>Adicionar novo produto</div>";
                        echo "<a href='../controllers/auth.controller.php?logout=true' class='logout'>Sair</a>";
                    }
                } else {
                    echo "<div class='add' onclick='document.getElementById(`id01`).style.display=`block`'>Adicionar novo produto</div>";
                    echo "<a href='../controllers/auth.controller.php?logout=true' class='logout'>Sair</a>";
                }
                
                ?>
            </div>
            

            <div class='products'>
                <?php
                    if(empty($items)) {
                        echo "<h3 class='empty'>Ops! Você não possui nenhum artigo cadastrado :(</h3>";
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

            <!-- MODAL -->
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <h3>Cadastrar Artigo</h3>
                    <form method="post" enctype="multipart/form-data" action="../controllers/item.controller.php?newArticle=true&user_id=<?php echo $usr['id'] ?>">
                        <label>Nome<br>
                            <input type="text" name="name" required>
                        </label>

                        <select name="category" required>
                            <option value="" selected disabled>Selecione uma categoria</option>
                            <?php
                            while($cat = mysqli_fetch_assoc($categories)) {
                                echo "
                                    <option value=".$cat['id'].">".$cat['name']."</option>
                                ";
                            }
                            ?>
                            
                        </select>

                        <label>Descrição<br>
                            <textarea maxlength="256" name="desc" required></textarea>
                        </label>

                        <label>Imagem<br>
                            <input type="file" name="thumb" accept="image/png, image/jpeg, image/jpg" required>
                        </label>

                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
                
        </div>
    </div>
</body>
</html>