<?php
	include('../php/banco.php');
	
	$cod=$_POST['cod'];
	
	$descricao= $_POST['descricao'];


	 
	
	
	$sql="update tb_assunto set  descricao = '$descricao' where cod_assunto = $cod";
	
	$update= $conexao-> query($sql);
	
	if($update){
		header('Location:busAssunto.php?update=ok');
	}else{
		header('Location:busAssunto.php?update=erro');
	}
?>