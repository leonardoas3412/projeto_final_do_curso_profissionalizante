<?php
	include('../php/banco.php');
	
	$cod= $_GET['cod'];
	
	$sql= "delete from tb_assunto where cod_assunto= $cod";
	
	$consulta=$conexao->query($sql);
	
	if($consulta){
		header('Location:busAssunto.php?delete=ok');
	}else{
		header('Location:busAssunto.php?delete=erro');
	}
?>