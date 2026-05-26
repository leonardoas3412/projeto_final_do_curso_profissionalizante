<?php
	include('../php/banco.php');
	
	$cod= $_GET['cod'];
	
	$sql= "delete from tb_aluno where cod_aluno= $cod";
	
	$consulta=$conexao->query($sql);
	
	if($consulta){
		header('Location:busAluno.php?delete=ok');
	}else{
		header('Location:busAluno.php?delete=erro');
	}
?>