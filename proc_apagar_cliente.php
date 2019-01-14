<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_cliente = "DELETE FROM clientes WHERE id='$id'";
	$resultado_cliente = mysqli_query($conn, $result_cliente);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Cliente apagado com sucesso</p>";
		header("Location: cad_cliente.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o cliente não foi apagado com sucesso</p>";
		header("Location: cad_cliente.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um cliente</p>";
	header("Location: cad_cliente.php");
}
