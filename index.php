<?php
/**
 * #############################################################################
 * #############################################################################
 * ESTA PARTE DO CÓDIGO É PARA EXIBIR TODOS OS ERROS QUE ESTIVEREM
 * SENDO ESCONDIDOS PELO PHP (CONFIGURAÇÃO NO php.ini)
 */
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
/**
 * ESTA PARTE DO CÓDIGO É PARA EXIBIR TODOS OS ERROS QUE ESTIVEREM
 * SENDO ESCONDIDOS PELO PHP (CONFIGURAÇÃO NO php.ini)
 * #############################################################################
 * #############################################################################
 */
// Conexão
require_once 'conexao.php';

// Sessão
session_start();
// Botão enviar
if (isset($_POST['btn-entrar'])):
    $erros = array();
    $login = mysqli_escape_string($conn, $_POST['login']);
    $senha = mysqli_escape_string($conn, $_POST['senha']);

    if (isset($_POST['lembrar-senha'])):
        setcookie('login', $login, time() + 3600);
        setcookie('senha', $senha, time() + 3600);
    endif;

    if (empty($login) or empty($senha)):
        $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
    else:

        $sql = "SELECT login FROM usuarios WHERE login = '$login'";
        $resultado = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultado) > 0):
           
            $_sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = md5('$senha')";

            $resultado = mysqli_query($conn, $_sql);



            if (mysqli_num_rows($resultado) == 1):

                $dados = mysqli_fetch_array($resultado);
                $dados1 = mysqli_fetch_assoc($resultado);
                mysqli_close($conn);
              
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                $_SESSION['nivel'] = $dados['nivel'];
           

                if (isset($dados['nivel']) == 1):
                  header('location: home.php');

                else:
                  header('location: home_user.php');
                endif;

            else:
                $erros[] = "  <li> Usuário e senha não conferem </li>";
            endif;

        else:
            $erros[] = "<li> Usuário inexistente </li>";
        endif;
    endif;
endif;
?>

<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" a href="css/style.css">
        <link rel="stylesheet" a href="css\font-awesome.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body id="LoginForm">

        <?php
        if (!empty($erros)):
            foreach ($erros as $erro):
                echo $erro;
            endforeach;
        endif;
        ?>

        <div class="container">
            <div class="card card-container">
                <div class="panel">
                    <center><h1>T.P.R.M.</h1></center>
                </div>
                <form id="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                        <input  class="form-control" id="inputEmail" type="text" name="login" placeholder="login" value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : '' ?>"><br>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="inputPassword" type="password" name="senha" placeholder="senha" value="<?php echo isset($_COOKIE['senha']) ? $_COOKIE['senha'] : '' ?>"><br>
                    </div>
                    <div class="forgot">
                        <center>Lembrar senha: <input  type="checkbox" name="lembrar-senha"></center>
                    </div>
                    <center><button class="btn btn-primary" type="submit" name="btn-entrar"  > Entrar </button></center>
                </form>
            </div>
        </div>
    </body>
</html>
