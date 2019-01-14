<?php
session_start();
include_once("conexao.php");

if (!isset($_SESSION['logado'])):
    header('Location: index.php');
endif;

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Menu Usuários</title>
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
                <a href="cad_usuario.php" class="btn azul_claro">Cadastrar</a><br><br>
                <a href="consultar_usuario.php" class="btn azul_claro">Consultar</a><br><br>
                <a href="logout.php" class="btn vermelho">Sair</a><br>
            </div>
        </div>
    </body>
</html>
