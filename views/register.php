<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrar</title>
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
    <div class="mainContainer">
        <form class="loginForm" action="../controllers/auth.controller.php" method="POST">
            <div>
            <label>Nome:</label>
            <input type='text' name='nome' required>
            </div>

            <div>
            <label>email:</label>
            <input type='email' name='email' required>
            </div>

            <div>
            <label>Senha:</label>
            <input type='password' name='senha' required>
            </div>

            <input class='button' type='submit' value='Cadastrar' name="signin"/>
        </form>
        
        <a href="./login.php">Fazer login</a>
    </div>
</body>
</html>