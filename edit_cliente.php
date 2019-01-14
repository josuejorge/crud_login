<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_cliente = "SELECT * FROM clientes WHERE id = '$id'";
$resultado_cliente = mysqli_query($conn, $result_cliente);
$row_cliente = mysqli_fetch_assoc($resultado_cliente);

if (!isset($_SESSION['logado'])):
    header('Location: index.php');
endif;

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Editar Cliente</title>
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
                <a href="logout.php" class="btn vermelho">Sair</a><br>
                <center><h1>Editar Cliente</h1></center>
                <?php
                if (isset($_SESSION['msg']))
                {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <form method="POST" action="proc_edit_cliente.php">
                    <input type="hidden" name="id" value="<?php echo $row_cliente['id']; ?>">
                    <input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_cliente['nome']; ?>"><br>
                    <input type="text"  type="email" name="email" placeholder="Digite o seu e-mail" value="<?php echo $row_cliente['email']; ?>"><br>
                    <input type="text"  type="phone" name="telefone" placeholder="Digite o seu telefone" value="<?php echo $row_cliente['telefone']; ?>"><br>
                    <input type="text"  type="phone" name="cpf" placeholder="Digite o CPF" value="<?php echo $row_cliente['cpf']; ?>"><br>
                    <input type="text" name="estado" placeholder="Digite o estado" value="<?php echo $row_cliente['estado']; ?>"><br>
                    <input type="text" name="bairro" placeholder="Digite o bairro" value="<?php echo $row_cliente['bairro']; ?>"><br>
                    <input type="text"  type="phone" name="cep" placeholder="Digite o CEP" value="<?php echo $row_cliente['cep']; ?>"><br>
                    <center><input type="submit" value="Editar"></center>
                </form>
            </div>
        </div>
    </body>
</html>
