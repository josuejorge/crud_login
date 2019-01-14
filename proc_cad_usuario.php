<?php

session_start();
include_once("conexao.php");



$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_EMAIL);
$senha = mysqli_real_escape_string($conn, trim(md5($_POST['senha'])));
$nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "INSERT INTO usuarios (nome, login, senha, created, nivel) VALUES ('$nome', '$login', '$senha', NOW(), '$nivel')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_insert_id($conn))
{
    $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
    header("Location: cad_usuario.php");
}
else
{
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
    header("Location: cad_usuario.php");
    
}
