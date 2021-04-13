<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>

<div class="login">
    <h1>Conexão</h1>
    <form action="php/tabela.php" method="post">
        <input type="text" name="host" placeholder="Host" required="required" />
        <input type="text" name="user" placeholder="Usuário" required="required" />
        <input type="text" name="porta" placeholder="Porta"/>
        <input type="password" name="senha" placeholder="Senha" required="required" />
        <input type="text" name="banco" placeholder="Banco de Dados"/>
        <button type="submit" class="btn btn-primary btn-block btn-large">Conectar</button>
    </form>
</div>

</body>

</html>
