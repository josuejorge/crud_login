<?php
session_start();
// Conexão
require_once 'conexao.php';
if (!isset($_SESSION['logado'])):
    header('Location: index.php');
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Cadastrar clientes</title>
        <link rel="stylesheet" a href="css/botao.css">
        <link rel="stylesheet" a href="css/style.css">
        <link rel="stylesheet" a href="css\font-awesome.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body id="LoginForm">

        <div class="container">
            <div class="card card-container">
                <a href="home.php" class="btn btn-secondary">Menu</a><br><br>
                <a href="./cad_cliente.php" class="btn azul_claro">Cadastrar</a><br><br>
                <a href="./consultar_cliente.php" class="btn azul_claro">Consultar</a><br><br>
                <a href="logout.php" class="btn vermelho">Sair</a>
                <center><h1>Cadastrar Cliente</h1></center>
                <?php
                if (isset($_SESSION['msg']))
                {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <form method="POST" action="proc_cad_cliente.php">
                    <input type="text" name="nome" placeholder="Digite o nome completo" required>



                    <input type="text" type="email" name="email" placeholder="Digite o e-mail" required>
                    <input type="text" type="phone" name="telefone" maxlength=15  placeholder="Digite o Telefone" required>
                    <input type="text" type="phone" maxlength=11 name="cpf" placeholder="Digite o CPF"required>
                    <input type="text" name="estado" placeholder="Digite o Estado"required>
                    <input type="text" name="bairro" placeholder="Digite o Bairro"required>
                    <input type="text" type="phone" maxlength=8 name="cep" placeholder="Digite o CEP"required>
		<br>
                    <center><input type="submit" value="Cadastrar"> </center>
                </form>
            </div>
        </div>
    </body>
</html>
