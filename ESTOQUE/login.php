<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css">
    <link rel="stylesheet" href="CSS/login2.css">
    <title>Tela de login</title>
</head>
<body>
    <form class="login" action="logar.php" method="POST" required>
        <h2>Login</h2>
        <div class="box-user">
            <input type="text" name="login" id="" required>
            <label>Usuário</label>
        </div>
        <div class="box-user">
            <input type="password" name="senha" id="" required>
            <label>Senha</label>
        </div>
        <div>
            <input class="btn" type="submit" value="ENTRAR">
        </div>
        <div>
            <a href="cadastro_usuario.php"><input class="btn" value="  Cadastre-se"></a>
        </div>
    </form>  
    </div>
</body>
</html>



