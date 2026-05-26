<?php
	include('../php/banco.php');
	
	$cod= $_GET['cod'];
	
	$sql= "delete from tb_prof where cod_prof= $cod";
	
	$consulta=$conexao->query($sql);
	
	if($consulta){
		header('Location:busProfessor.php?delete=ok');
	}else{
		header('Location:busProfessor.php?delete=erro');
	}
?>