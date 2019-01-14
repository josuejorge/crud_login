<?php
session_start();
include_once "conexao.php";

if (!isset($_SESSION['logado'])):
    header('Location: index.php');
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <title>Consultar Cliente</title>
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
                <a href="cad_cliente.php" class="btn azul_claro">Cadastrar</a><br><br>
                <a href="consultar_cliente.php" class="btn azul_claro">Consultar</a><br><br>
                <a href="logout_cliente.php" class="btn vermelho">Sair</a>
                <center><h1>Consultar Cliente</h1></center>
                <form method="POST" action="">
                    <input type="text" name="nome" placeholder="Digite o nome do Cliente" required><br><br>
                    <center><input name="SendPesqUser" type="submit" value="Pesquisar"></center>
                </form><br><br>

                <?php
                $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
                if ($SendPesqUser)
                {
                    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                    $result_cliente = "SELECT * FROM clientes WHERE nome LIKE '%$nome%'";
                    $resultado_cliente = mysqli_query($conn, $result_cliente);

                    
                    if ($resultado_cliente->num_rows >= 1)
                    {
                        
                        while ($row_cliente = mysqli_fetch_assoc($resultado_cliente))
                        {
                            echo "ID: " . $row_cliente['id'] . "<br>";
                            echo "Nome: " . $row_cliente['nome'] . "<br>";
                            echo "E-mail: " . $row_cliente['email'] . "<br>";
                            echo "<a href='edit_cliente.php?id=" . $row_cliente['id'] . "'>Editar</a><br>";
                            echo "<a href='proc_apagar_cliente.php?id=" . $row_cliente['id'] . "' data-confirm='Tem Certeza que deseja excluir o item selecionado ?'>Apagar</a><br><hr>";
                        }
                    }
                }
                ?>

                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
                <script src="js/personalizado.js"></script>
            </div>
        </div>
    </body>
</html>
