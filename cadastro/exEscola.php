<?php
	include('../php/banco.php');
	
	$cod= $_GET['cod'];
	
	$sql= "delete from tb_escola where cod_escola= $cod";
	
	$consulta=$conexao->query($sql);
	
	if($consulta){
		header('Location:busEscola.php?delete=ok');
	}else{
		header('Location:busEscola.php?delete=erro');
	}
?>