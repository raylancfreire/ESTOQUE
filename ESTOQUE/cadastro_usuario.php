<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/login.css">
        <title>Cadastro de Usuarios</title>
    </head>
    <body>
        <div class="login">
            <h2>Cadastro de Usuários</h2>
            <br>
            <form action="CRUD/cad_usuario.php" method="post" id="formulario">
                <div class="box-user">
                    <input type="email" name="email" id="" required>
                    <label>Email</label>
                </div>
                <div class="box-user">
                    <input type="text" name="nome" id="" required>
                    <label>Nome</label>
                </div>
                <div class="box-user">
                    <select name="categoria" id="" style="width: 100%; padding: 10px 0; outline: none; border: 0; background-color: #172031;  border-bottom: 1px solid #fff; color: #fff;font-size: 16px; margin-bottom: 30px; appearance: none; -webkit-appearance: none;-moz-appearance: none;">
                        <option selected disabled value="">Selecione o tipo de Usuário</option>
                        <option value="ADMIN">Admin</option>
                        <option value="FUNCIONARIO">Funcionário</option>
                        <option value="INSPETOR">Inspetor</option>
                    </select>
                </div>
                <div class="box-user">
                    <input type="text" name="login" id="" required>
                    <label>Login</label>
                </div>
                <div class="box-user">
                    <input type="password" name="senha" id="" required>
                    <label>Senha</label>
                </div>
                <div>
                    <input class="btn" type="submit"><br>
                    <a href="login.php"><input class="btn" value="       Login"></a>
                </div>
            </form>
        </div>
    </body>
</html>


