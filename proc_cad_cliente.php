<?php

session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cep = $_POST['cep'];
$result_cliente = "INSERT INTO clientes (nome, email, telefone, cpf, estado, bairro, cep, created) VALUES ('$nome', '$email', '$telefone', '$cpf', '$estado', '$bairro', '$cep', NOW())";
$resultado_cliente = mysqli_query($conn, $result_cliente);

if (mysqli_insert_id($conn))
{
    $_SESSION['msg'] = "<p style='color:green;'>Cliente cadastrado com sucesso</p>";
    header("Location: cad_cliente.php");
}
else
{
    $_SESSION['msg'] = "<p style='color:red;'>Cliente não foi cadastrado com sucesso</p>";
    header("Location: cad_cliente.php");
}
