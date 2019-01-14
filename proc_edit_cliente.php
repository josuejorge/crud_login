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

$result_cliente = "UPDATE clientes SET nome='$nome', email='$email',
 telefone='$telefone', cpf='$cpf', estado='$estado', bairro='$bairro', cep='$cep' WHERE id='$id'";
$resultado_cliente = mysqli_query($conn, $result_cliente);

if (mysqli_affected_rows($conn))
{
    $_SESSION['msg'] = "<p style='color:green;'>Cliente editado com sucesso</p>";
    header("Location: edit_cliente.php");
}
else
{
    $_SESSION['msg'] = "<p style='color:red;'>Cliente não foi editado com sucesso</p>";
    header("Location: edit_cliente.php?id=$id");
}
