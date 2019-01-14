<?php
// Conexão
require_once 'conexao.php';

// Sessão
session_start();

// Verificação
if (!isset($_SESSION['logado'])):
    header('Location: index.php');
endif;

// Dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($conn);

if($dados['nivel']==1){
    header("Location: home.php");
}
?>

<html>
    <head>
        <title>Página Inicial</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
                <center>
                    <br>
                    <div class="panel">
                        <h1> Olá, <?php echo $dados['nome']; ?> </h1>
                    </div>

                    <br><br><br>
                    <a href="listar_cliente.php" class="btn azul_claro">Cadastro de Clientes</a>
                    <br><br><br><br>

                    <a href="logout.php" class="btn vermelho">Sair</a>
                </center>

            </div>
        </div>
    </body>
</html>
