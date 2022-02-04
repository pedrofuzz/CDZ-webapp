<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Autenticar</title>
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
    <div class="mainContainer">
        <form class='loginForm' action="../controllers/auth.controller.php" method="POST">
            <div>
            <label>Email:</label>
            <input type='email' name='email'>
            </div>
            
            <div>
            <label>Senha:</label>
            <input type='password' name='senha'>
            </div>
    
            <input class='button' type='submit' value='Entrar' name='login'/>
        </form>
        
        <a href="./register.php">Cadastrar-se</a>
    </div>
</body>
</html>